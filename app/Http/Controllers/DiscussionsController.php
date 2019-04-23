<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use App\Reply;
use App\User;

use Notification;
use Auth;

use Session;


class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.discuss');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required'

        ]);

        $discussion = Discussion::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'channel_id'=>$request->channel_id,
            'user_id'=>Auth::id(),
            'slug'=>str_slug($request->title),



        ]);

        Session::flash('success','Discussion Created Successfully');
      

        // return redirect('/discussions');
        return redirect()->route('discussions.show',['slug'=>$discussion->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion=Discussion::where('slug',$slug)->first();
        $best_answer = $discussion->replies()->where('best_answer',1)->first();
        return view('discussions.show')->with('d',$discussion)->with('best_answer',$best_answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $discussion = Discussion::where('slug',$slug)->first();
        return view('discussions.edit')->with('d',$discussion);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'content'=>'required',

        ]);
        $d = Discussion::findOrFail($id);
        $d->content= $request->content;
        $d->save();

        Session::flash('success','Discussion updated');

        return redirect()->route('discussions.show',['slug'=>$d->slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply(Request $request,$id)
    {
        $d = Discussion::findOrFail($id);

        $this->validate($request,[
            // 'user_id'=>'required',
            // 'discussion_id'=>'required',
            'content'=>'required',


        ]);

        
        $reply = Reply::create([
            'user_id'=>Auth::id(),
            'discussion_id'=>$d->id,
            'content'=>request()->content
        ]);
        $reply->user->points +=25;
        $reply->user->save();

        $watchers = array();

        foreach($d->watchers as $watcher):
            array_push($watchers,User::findOrFail($watcher->user_id));

        endforeach;
        // dd($watchers);
        // Notification::send($watchers,new \App\Notifications\NewReplyAdded($d));


        Session::flash('success','Reply Added');

        return redirect()->back();
    }
}

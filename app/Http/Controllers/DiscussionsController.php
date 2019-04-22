<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use App\Reply;


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
        return view('discussions.show')->with('d',$discussion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function reply($id)
    {
        $d = Discussion::findOrFail($id);
        $reply = Reply::create([
            'user_id'=>Auth::id(),
            'discussion_id'=>$d->id,
            'content'=>request()->content
        ]);

        Session::flash('success','Reply Added');

        return redirect()->back();
    }
}

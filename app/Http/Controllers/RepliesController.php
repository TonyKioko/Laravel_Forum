<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reply;
use App\Like;

use Auth;
use Session;


class RepliesController extends Controller
{
    public function like($id){
        $reply = Reply::findOrFail($id);
        Like::create([

            'reply_id'=>$reply->id,
            'user_id'=>Auth::id()
        ]);

        Session::flash('success','You liked a Reply');

        return redirect()->back();
    }

    public function unlike($id){
        $like = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();

        $like->delete();

        Session::flash('success','You unliked a Reply');

        return redirect()->back();


    }
    public function best_answer($id){
        $reply = Reply::findOrFail($id);
        $reply->best_answer = 1;
        $reply->save();
        
        Session::flash('success','Reply marked as best answer');


        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watcher;
use App\User;
use Auth;

use Session;


class WatchersController extends Controller
{
    public function watch($id){

        Watcher::create([

            'user_id'=>Auth::id(),
            'discussion_id'=>$id
        ]);

        Session::flash('success','You are watching this discussion');

        return redirect()->back();

    }

    public function unwatch($id){

       $watcher = Watcher::where('discussion_id',$id)->where('user_id',Auth::id())->first();

       $watcher->delete();

        Session::flash('success','You unwatched this discussion');

        return redirect()->back();

    }
}

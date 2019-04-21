@extends('layouts.app')

@section('content')
        @if($discussions->count()>0)
        @foreach($discussions as $d)
        <div class="panel panel-default">
            <div class="panel-heading">
                
            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="70px" height="70px">&nbsp;&nbsp;
            <span>
                     {{$d->user->name}} , {{$d->created_at->diffForHumans()}}
  
                  </span>

                <a href="{{route('discussions.show',['slug'=>$d->slug])}}" class="btn btn-default ml-auto">View</a>
            </div>

            <div class="panel-body">

                <h3 class="text-center">
<b>
    {{$d->title}}

</b>

                </h3>
                <p class="text-center">
                    {{str_limit($d->content,50)}}
                </p>

            </div>


            <div class="panel-footer text-center">

            <p>
                Replies
                <span>


                    {{$d->replies->count()}}
                </span>
            </p>
            </div>

        </div>
        <div class="text-center">
            <p>
            {{$discussions->links()}}
        </div>


        @endforeach

        @endif
    
@endsection

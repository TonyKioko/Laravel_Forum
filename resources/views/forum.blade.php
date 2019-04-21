@extends('layouts.app')

@section('content')
        @if($discussions->count()>0)
        @foreach($discussions as $d)
        <div class="panel panel-default">
            <div class="panel-heading">
                <p>

                </p>
            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="70px" height="70px">
            </div>

            <div class="panel-body">


                {{$d->content}}

            </div>

        </div>
        <div class="text-center">

            {{$discussions->links()}}
        </div>


        @endforeach

        @endif
    
@endsection

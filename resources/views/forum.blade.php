@extends('layouts.app')

@section('content')
        @if($discussions->count()>0)
        @foreach($discussions as $d)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                
                </div>


        <div class="card">
            <div class="card-header">
                
            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="40px" height="40px">&nbsp;&nbsp;
            <span>
                     {{$d->user->name}} , {{$d->created_at->diffForHumans()}}
  
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                  @if($d->hasBestAnswer())

                  <span class="badge badge-danger badge-pill" style="padding:10px;font-size:15px;">closed</span>
                  @else
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span class="badge badge-primary badge-pill" style="padding:10px;font-size:15px;">open</span>

                  @endif

                <a href="{{route('discussions.show',['slug'=>$d->slug])}}" class="btn btn-outline-primary btn-xs">View</a>
            </div>

            <div class="card-body">

                <h3 class="text-center">
<b>
        <a href="{{route('discussions.show',['slug'=>$d->slug])}}"style="text-decoration:none;color:black;">
    {{$d->title}}
</a>

</b>

                </h3>
                <p class="">
                        <a href="{{route('discussions.show',['slug'=>$d->slug])}}"style="text-decoration:none;color:black;">
                                {{str_limit($d->content,290)}}
                        
                        </a>

                </p>

            </div>


            <div class="card-footer text-center">

                    <a href="{{route('discussions.show',['slug'=>$d->slug])}}"type="button" class="btn btn-primary">
                            Replies <span class="badge badge-light">{{$d->replies->count()}}</span>
                           
                    </a>

            {{-- <p>
                Replies
                <span>


                    {{$d->replies->count()}}
                </span class="btn btn-default btn-xs pull-right">


                <span>{{$d->channel->title}}</span>
            </p> --}}
            </div>

        </div>
    </div>

        <br>
        {{-- <br> --}}

        


        @endforeach
    </div>

        <div class="text-center">
                <p>
                {{$discussions->links()}}
        </div>

        @endif
    
@endsection

@extends('layouts.app')

@section('content')

<div class="card card-default">
        <div class="card-img-top">
            
        <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="70px" height="70px">&nbsp;&nbsp;
        <span>
                 {{$d->user->name}} , {{$d->created_at->diffForHumans()}}

              </span>
{{-- 
            <a href="{{route('discussions.show',['slug'=>$d->slug])}}" class="btn btn-default ml-auto">View</a> --}}
        </div>

        <div class="card-body">

            <h3 class="text-center">
<b>
{{$d->title}}

</b>

            </h3>
            <hr>
            <p class="text-center">
                {{$d->content}}
            </p>

        </div>


        <div class="card-footer text-center">

        <p>
            Replies
            <span>


                {{$d->replies->count()}}
            </span>
        </p>
        </div>

    </div>
@foreach($d->replies as $r)


<div class="card card-default">
        <div class="card-img-top">
            
        <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="70px" height="70px">&nbsp;&nbsp;
        <span>
                 {{$r->user->name}} ,
                 <b>

                     {{$r->created_at->diffForHumans()}}
                 </b>

              </span>
{{-- 
            <a href="{{route('discussions.show',['slug'=>$d->slug])}}" class="btn btn-default ml-auto">View</a> --}}
        </div>

        <div class="card-body">

            <hr>
            <p class="text-center">
                {{$r->content}}
            </p>

        </div>


        <div class="card-footer text-center">

        <p>
            <span>


               Like
            </span>
        </p>
        </div>

    </div>

    


@endforeach
<div class="card">
    <div class="card-body">

    <form action="{{route('discussion.reply',['id'=>$d->id])}}" method="POST">
    {{csrf_field()}}


        <div class="form-group">
            <label for="content">Reply</label>

            <textarea name="content" id="" cols="30" rows="7" class="form-control"></textarea>


        </div>
        <div class="form-group">

            <button class="btn pull-right btn-primary">Reply</button>
        </div>

    
    </form>
    </div>
</div>
    
@endsection

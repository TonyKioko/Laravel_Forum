@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-header">
            
        <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="40px" height="40px">&nbsp;&nbsp;
        <span>
                 {{$d->user->name}} , {{$d->created_at->diffForHumans()}}

              </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              @if($d->is_being_watched_by_auth_user())
              <a href="{{route('discussion.unwatch',['id'=>$d->id])}}" class="badge badge-pill badge-danger" style="font-size:15px;padding:5px;">unwatch</a>
              @else
  
              <a href="{{route('discussion.watch',['id'=>$d->id])}}" class="badge badge-pill badge-success  ml-auto" style="font-size:15px;padding:5px;">watch</a>
  
              @endif

              @if(Auth::id() == $d->user_id)

              <a href="{{route('discussions.edit',['slug'=>$d->slug])}}" class="badge badge-info badge-md ml-auto">edit</a>


              @endif


        </div>

        <div class="card-body">

            <h3 class="text-center">
<b>
{{$d->title}}

</b>

            </h3>
            <hr>
            <p class="text-center">
                {!!Markdown::convertToHtml($d->content)!!}
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
    <br>

@foreach($d->replies()->where('best_answer',0)->get() as $r)


<div class="card">
        <div class="card-header">
            
        <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="40px" height="40px">&nbsp;&nbsp;
        <span>
                 {{$r->user->name}} (<span>
                     <b>

                         {{$r->user->points}}
                     </b>
                    </span>) ,
                 <b>

                     {{$r->created_at->diffForHumans()}}
                 </b>

              </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              @if(Auth::id() == $d->user_id)
              @if(!$best_answer)
            <a href="{{route('reply.best',['id'=>$r->id])}}" class="badge badge-primary badge-pill pull-right">mark as best answer</a>
            
              @endif
              @endif


              
            
        </div>

        <div class="card-body">

            <hr>
            <p class="text-center">
                {!!Markdown::convertToHtml($r->content)!!}
            </p>

        </div>


        <div class="card-footer">
            @if($r->liked_by_auth_user())

            <a href="{{route('reply.unlike',['id'=>$r->id])}}" class="badge badge-danger badge-pill"style="padding:8px;font-size:15px;">Unlike</a>
            @else
        <a href="{{route('reply.like',['id'=>$r->id])}}" class="badge badge-success badge-pill"style="padding:8px;font-size:15px;">Like
        </a>


        <span class="badge" style="font-size:15px;">{{$r->likes->count()}}</span>
            @endif

        </div>

    </div>
    <br>


     @if($best_answer)

    <div class="card card-default">
        <div class="card-img-top">
            
        <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="" width="70px" height="70px">&nbsp;&nbsp;
        <span>
                 {{$best_answer->user->name}} (<span> {{$best_answer->user->points}} </span>), 
                 <b>

                     {{$best_answer->created_at->diffForHumans()}}
                 </b>

              </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="" class="badge badge-primary badge-pill pull-right" style="padding:10px;font-size:15px;">best answer</a>

              
            
        </div>

        <div class="card-body">

            <hr>
            <p class="text-center">
                {!!Markdown::convertToHtml($best_answer->content)!!}
            </p>

        </div>


        <div class="card-footer text-center">
            @if($best_answer->liked_by_auth_user())

            <a href="{{route('reply.unlike',['id'=>$best_answer->id])}}" class="btn btn-danger">Unlike</a>
            @else
        <a href="{{route('reply.like',['id'=>$best_answer->id])}}" class="btn btn-success">Like
        </a>


        <span class="badge">{{$best_answer->likes->count()}}</span>
            @endif

        </div>

    </div>


    @endif 

    


@endforeach

<div class="card">
    <div class="card-body">

    <form action="{{route('discussion.reply',['id'=>$d->id])}}" method="POST">
    {{csrf_field()}}


        <div class="form-group">
            <label for="content">
                <b>

                    Leave a Reply
                </b>
            </label>

            <textarea name="content" id="" cols="30" rows="7" class="form-control"></textarea>


        </div>
        <div class="form-group">

            <button class="btn pull-right btn-primary">Reply</button>
        </div>

    
    </form>
    </div>
</div>
    
@endsection

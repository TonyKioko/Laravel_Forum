@extends('layouts.app')



@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Create new Discussion</div>

    <div class="panel-body">

    <form action="{{route('discussions.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group">
            <label for="title">Select Channel</label>
            <select name="channel_id" id="channel_id" class="form-control">
                @if($channels->count() > 0)
                @foreach($channels as $channel)
            <option value="{{$channel->id}}">{{$channel->title}}
            </option>
            @endforeach
            @endif

            </select>

        </div>
        <div class="form-group">
            <label for="title">Title</label>
<input type="text" id="title" name="title" class="form-control">
        </div>


        <div class="form-group">
            <label for="content">Ask Question</label>

            <textarea class="form-control" id="content" name="content" cols="5" rows="6"></textarea>
        </div>

      




        {{-- <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="summernote" cols="5" rows="10" class="form-control"></textarea>
    
            </div> --}}

            {{-- <div class="form-group">
                <label for="tags"></label>
                <h5>Select Tags</h5>
                @foreach($tags as $tag)
               <div class="checkbox">

               <label for=""><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
               </div>
               @endforeach
    
            </div> --}}




            {{-- <div class="form-group">
                    <label for="featured">Featured</label>
        
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                        
                    <button class="btn btn-success">Publish</button>

                    </div> --}}

                    <div class="form-group text-center">
                        
                            <button type="submit" class="btn btn-success">Create</button>
        
                            </div>
            
        </form>

    </div>

</div>


@endsection


{{-- 
@section('styles')

@endsection


@section('scripts')



<script>

$(document).ready(function() {
    $('#summernote').summernote();
});
  

</script>

@endsection --}}



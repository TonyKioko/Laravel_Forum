@extends('layouts.app')



@section('content')


<div class="container">

   

<div class="panel panel-default">

    <div class="panel-heading">Update channel</div>

    <div class="panel-body">

    <form action="{{route('channels.update',['id'=>$channel->id])}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="title">Channel</label>

        <input type="text" name="title" class="form-control" value="{{$channel->title}}">
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
                        
                            <button type="submit" class="btn btn-success">Update</button>
        
                            </div>
            
        </form>

    </div>

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



@extends('layouts.app')



@section('content')


<div class="panel panel-default">

    <div class="panel-heading">Update Discussion</div>

    <div class="panel-body">

    <form action="{{route('discussions.update',['id'=>$d->id])}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        {{ method_field('PUT') }}
      
        <div class="form-group">
        <label for="title"></label>
            <h3>{{$d->title}}</h3>


        <div class="form-group">
            <label for="content">Update Question</label>

        <textarea class="form-control" id="content" name="content" cols="5" rows="6">{{$d->content}}</textarea>
        </div>



                    <div class="form-group text-center">
                        
                            <button type="submit" class="btn btn-success">Save Changes</button>
        
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



@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">
                    @if($channels->count() > 0)

                    <table class="table table-striped">
                    <thead>
                            <tr>
                    
                        <th>
                    
Name                    
                        </th>
                       <th>
                    
                    Edit
                            
                                </th> 
                    
                                <th>
                    
                                        Trash
                                                
                                                    </th> 
                            </tr>
                    
                    </thead>
                    <tbody>
                    @foreach($channels as $channel)
                    
                    <tr style="line-height: 300%;">
                            {{-- <td>
                    
                        <a href="">
                        <img src="{{$post->featured}}" alt="{{$post->title}}" class="rounded-circle" width="50px" height="50px">
                    
                        </a>
                        </td> --}}
                    
                        <td>
                    
                                <a href="">
                                    {{$channel->title}}
                            
                                </a>
                                </td>
                    
                        <td>

                        <a href="{{route('channels.edit',['id'=>$channel->id])}}"
                            
                                class="btn btn-xs btn-info"
                            >EDIT</a>
                            
                            {{-- <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-xs btn-info">EDIT
                            
                            </a> --}}
                        </td>
                    
                        <td>

                                {{-- <a href="{{route('channels.destroy',['id'=>$channel->id])}}"
                                    
                                        class="btn btn-danger" 
                                    >DELETE</a> --}}
                                <form action="{{route('channels.destroy',['id'=>$channel->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btn-danger" type="submit">Trash</button>
                    
                                       </form>
                                {{-- <form action="/admin/categories/{{ $category->id }}" method="post">
                                    {{ method_field('delete') }}
                                    <button class="btn btn-default" type="submit">Delete</button>
                                </form>
                                <a href="{{route('categories.destroy',['id'=>$category->id])}}" class="btn btn-danger btn-xs">DELETE</a>   --}}
                    
                        </td>
                    
                    
                    
                    
                    </tr>
                    @endforeach
                    
                    
                    </tbody>
                    </table>
                    
                    @else
                    
                    <h4 class="text-center">No Channels</h4>
                    
                    @endif
                    
                </div>
            </div>
     
@endsection

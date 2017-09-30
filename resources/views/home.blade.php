@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Welcome to your Dashboard</h2></div>

                <div class="panel-body">
                    
                    <a href="posts/create" class="btn btn-primary pull-right">Create posts</a>
                    <h3>Your Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th><h3>Title</h3></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td><h4>{{$post->title}}</h4></td>
                                    <td><a href="posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post ->id], 'method' => 'POST', 'class' => 'pull-right', 'style' => 'padding-right = 5px']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}                      
                                    </td>
                                </tr>                          
                            @endforeach
                    </table>
                    @else
                        <h4 class="jumbotron">You have no posts yet</h4> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

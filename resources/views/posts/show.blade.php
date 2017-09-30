@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="/posts" class="btn btn-default">Back</a>
		<hr>
		
		<h1>{{$posts -> title}}</h1>
		<img src="../storage/cover_images/{{$posts->cover_image}}" style="width:100%; height:">
		<div class="jumbotron container">{!!$posts -> body!!}</div>

		<small>
			Written by <strong>{{$posts->user->name}}</strong> on: {{$posts -> created_at}} 
			<br>
			Updated on: {{$posts -> updated_at}}
		</small>
		<br>
		<form action="/comment/{{$posts->id}}" method="POST">
			{{csrf_field()}}
			<div class="form-group">
				<label for="comment">Add a comment</label><br>
				<textarea name="comment" id="comment" cols="80" rows="8"></textarea>
			</div>
			<button class="btn btn-default">Post</button>
		</form>
		@if(count($comment) > 1)
		<h3>Comments</h3>
		@foreach($comment as $comment)
		<span>{{$comment->comment}} by {{$comment->name}} <img src="{{$comment->avatar}}" alt="{{$comment->name}}" class="thumbnail"></span><br>
		@endforeach
		@endif
		<hr>
		@if(!Auth::guest())
		@if(Auth::user()->id === $posts -> user_id)
			<a href="{{$posts -> id}}/edit" class="btn btn-default">Edit Post</a>

			{!! Form::open(['action' => ['PostsController@destroy', $posts ->id], 'method' => 'POST', 'class' => 'pull-right', 'style' => 'padding-right = 5px']) !!}
				{{Form::hidden('_method', 'DELETE')}}
				{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
			{!! Form::close() !!}
		@endif
		@endif
	</div>
@endsection
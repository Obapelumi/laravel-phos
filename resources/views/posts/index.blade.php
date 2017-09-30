@extends('layouts.app')

@section('content')

	<div class="container">
	<h1>Posts</h1>

	@if(count($posts) < 1)
		<h3 class="container jumbotron">No posts found</h3>
	@else
		@foreach($posts as $post)
		<div class="container well">
			<div class="col-md-3 col-sm-3">
				<img src="storage/cover_images/{{$post->cover_image}}" style="width:100%; height: 150px">
			</div>
			<div class="col-md-9 col-sm-9">
				<h2><a href="posts/{{$post -> id}}">{{$post -> title}}</a></h2>
				<small>Written On: {{$post -> created_at}} by <strong>{{$post->user->name}}</strong></small>				
				</div>
		</div>
		@endforeach
		{{$posts-> links()}}
		</div>
	@endif
@endsection
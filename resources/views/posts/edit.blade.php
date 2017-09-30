@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="/laravel/public/posts" class="btn btn-default">Back to Posts</a>
		<h1>Create Post</h1>
			{!! Form::open(['action' => ['PostsController@update', $posts-> id], 'method' => 'POST']) !!}
    			<div class="form-group">
    				{{Form::label('title', 'Title')}}
    				{{Form::text('title', $posts -> title, ['class'=> 'form-control', 'place-holder' => 'Title'])}}
    			</div>
    			<div class="form-group">
    				{{Form::label('body', 'Body')}}
    				{{Form::textarea('body', $posts -> body, ['class'=> 'form-control', 'place-holder' => 'Body Text', 'id' => 'article-ckeditor'])}}
    			</div>
                <div class="form-group">
                    {{Form::file('cover_image')}}
                </div>
    			{!! Form::hidden('_method', 'PUT') !!}
    			{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
			{!! Form::close() !!}

	</div>

@endsection

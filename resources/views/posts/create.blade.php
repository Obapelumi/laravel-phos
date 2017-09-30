@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{asset('/posts')}}" class="btn btn-default">Back to Posts</a>
		<h1>Create Post</h1>
			{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    			<div class="form-group">
    				{{Form::label('title', 'Title')}}
    				{{Form::text('title', '', ['class'=> 'form-control', 'place-holder' => 'Title'])}}
    			</div>
    			<div class="form-group">
    				{{Form::label('body', 'Body')}}
    				{{Form::textarea('body', '', ['class'=> 'form-control', 'place-holder' => 'Body Text', 'id' => 'article-ckeditor'])}}
    			</div>
    			<div class="form-group">
    				{{Form::file('cover_image')}}
    			</div>
    			{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
			{!! Form::close() !!}

	</div>

@endsection


























































{{-- 

			<div class="form-group">
				{{Form::label('title', 'Title')}}
				{{Form::text('title', '', ['class'=> 'form-control', 'placeholder' => 'Title'])}}
			</div>

			<div class="form-group">
				{{Form::label('body', 'Body')}}
				{{Form::textarea('body', '', ['class'=> 'form-control', 'placeholder' => 'Body text'])}}
			</div>
    		{{Form::submit('Submit', 'class'  => 'btn btn-primary')}} 

				<form action="{{route('posts.create')}}" method="POST">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control">
				</div>

				<div class="form-group">
					<label for="body">Body</label><br>
					<textarea rows="10" cols="150%" placeholder="Body Text"></textarea>
				</div>
				<input type="submit" name="submit" class="btn btn-primary" value="Submit">
				
			</form>

--}}
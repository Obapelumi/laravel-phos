@extends('layouts.app')

@section('content')

<h1>{{$title}}</h1>


<p>This is the services page of Traversy media laravel tutorial</p>

@if(count('services') > 0)
	@foreach($services as $service)
		<ul class="list-group" style="max-width: 30%">
			<li  class="list-group-item">{{$service}}</li>
		</ul>
	@endforeach
@endif

@endsection

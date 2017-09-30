<!DOCTYPE html>
<html>
<html lang="{{ app()->getLocale() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{config('app.name', 'laravel.learn')}}</title>


     <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>

{{-- <style type="text/css">
    [v-cloak]{
        display: none;
    }
</style> --}}

<body>
	@include('inc.navbar')
    <div id="apps">
    </div>
	<div class="container-fluid">
		@include('inc.messages')
		@yield('content')<br>
	</div> 

	<script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('../vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script src="js\vue-testing.js"></script>

</body>
</html>

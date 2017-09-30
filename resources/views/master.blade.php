<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="..\resources\views\style.css" rel="stylesheet" type="text/css">
        <link href="..\resources\views\bootstrap.css" rel="stylesheet" type="text/css">

    </head>
    <body>       
        @include('includes.header')
        <div class="container position-ref full-height">
        <h1 class="content">@yield('title')</h1><br>

        <p>@yield('content')</p>

        </div>
        <script type="text/javascript" src="..\resources\views\jquery.js"></script>
        <script type="text/javascript" src="..\resources\views\bootstrap1.js"></script>
    </body>
</html>

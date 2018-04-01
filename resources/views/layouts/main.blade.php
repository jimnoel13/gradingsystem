<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Tab Icon -->
        <link rel="icon" class="icon" href="{!! asset('images/st-therese-icon.ico') !!}"/>

        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

        <!-- Script Files -->
        <script src="https://ajax.googleapis.com/ajax/libs/query/1.12.0/jquery.min.js"></script>
        <title>{{ config('app.name','SaintTherese') }}</title>
    </head>
    <body>
    @include('inc.navbar')
    <div class="container">
        @include('inc.messages')
        @yield('content')

    </div>
    <hr>    
    <footer class="text-center">Copyright &copy; | {{ config('app.name') }}</footer>

    <script src="{{ asset('js/app.js') }}"></script>
    
    </body>
</html>

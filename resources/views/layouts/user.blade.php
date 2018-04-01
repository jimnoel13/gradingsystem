<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>{{ config('app.name','SaintTherese') }}</title>
    </head>
    <body>
    @include('inc.navbar')
    <div class="margin-left margin-right">
        @include('inc.messages')
        </div>
        @yield('profile')


    <hr>    
    <footer class="text-center">Copyright &copy; | {{ config('app.name') }}</footer>

    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

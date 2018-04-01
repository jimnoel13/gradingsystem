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
        </div>
        
        <div class="text-center">
        <h1><img id="frontlogo" class="d-inline" src="{{ asset('images/st-therese-logo.jpg') }}"> St. Therese of the Child Jesus Institute of Arts and Sciences</h1>
        </div>
        <div class="front">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="text-front">
                <h1 id="ol" class="text-center">Online Grading System</h1>
                <p class="text-center">Whatever you have learned or received or heard<br>from me, or seen in me-- put it into practice.<br>And the God of peace will be with you.<br><strong>Philippians 4:9</strong></p>
            </div>
            </div>
        </div>
        <br>


        <!-- Admin Login Modal -->
        <div class="modal modal-center" id="adminlogin">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><span class="fa fa-user-circle"></span> Login as Admin</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset('images/admin.png') }}" id="user">
                        </div>
                        <br>
                        <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary block">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div> <!-- End of Admin Login Modal -->



        <!-- Faculty Login Modal -->
        <div class="modal" id="facultylogin">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><span class="fa fa-user-circle"></span> Login as Faculty</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset('images/faculty.png') }}" id="user">
                        </div>
                        <br>

                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary block">
                                    Login
                                </button>

                                <div class="text-center top">
                                    <a class="link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div> <!-- End of Faculty Login Modal -->


<hr>    
    <footer class="text-center">Copyright &copy; | {{ config('app.name') }}</footer>

    <script src="{{ asset('js/app.js') }}"></script>
    
    </body>
</html>
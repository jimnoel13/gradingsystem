@extends('layouts.main')

@section('content')
    <h2><img src="{{ asset('images/st-therese-logo.jpg') }}"> Faculty <a href="{{ route('faculty.index') }}" class="btn btn-default pull-right"> Go Back</a></h2>
    <hr>
    <br>
    <div class="row input-margin-top">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-user-plus"></span> Add Faculty</div>

                <div class="panel-body">
                    {!! Form::open(['action' => 'RegistrationController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <!-- Full Name -->
                        <div class="row input-margin-top">
                            <div class="col-md-6">
                                <label name="first_name"> First Name</label>
                                <input type="text" name="first_name" placeholder="eg. Juan" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label name="last_name"> Last Name</label>
                                <input type="text" name="last_name" placeholder="eg. Dela Cruz" class="form-control">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row input-margin-top">
                            <div class="col-md-12">
                                <label name="email"> Email Address</label>
                                <input type="email" name="email" placeholder="eg. example@example.com" class="form-control">
                            </div>
                        </div>

                        <!-- Sex -->
                        <div class="row input-margin-top">
                            <div class="col-md-12">
                                <label name="sex"> Sex</label>
                                <select name="sex" class="form-control">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="row input-margin-top">
                            <div class="col-md-12">
                                <label name="location"> Location</label>
                                <input type="text" name="location" placeholder="eg. # Street, City, Country" class="form-control">
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="row input-margin-top">
                            <div class="col-md-12">
                                <label name="contact_number"> Contact Number</label>
                                <input type="text" name="contact_number" placeholder="eg. 09## #### ###" class="form-control">
                            </div>
                        </div>


                        <!-- Password -->
                        <div class="row input-margin-top">
                            <div class="col-md-6">
                                <label name="password"> Password</label>
                                <select name="password" class="form-control">
                                    <option value="password"> ********</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label name="password_confirmation"> Password Confirmation</label>
                                <select name="password_confirmation" class="form-control">
                                    <option value="password"> ********</option>
                                </select>
                            </div>
                        </div>

                        <!-- Profile & Background Picture-->
                        <div class="row input-margin-top">
                            <div class="col-md-6">
                                <label>Profile Picture</label>
                                {{ Form::file('profile_picture') }}
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="row input-margin-top">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Add Professor</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

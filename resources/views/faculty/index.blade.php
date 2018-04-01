@extends('layouts.main')

@section('content')
	<h2><img src="{{ asset('images/st-therese-logo.jpg') }}"> Faculty <a href="#" data-toggle="modal" data-target="#addfaculty" class="btn btn-primary pull-right"><span class="fa fa-user-plus"></span> Add Faculty</a></h2>
	<hr>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact Number</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td></td>
				<td><a href="{{ route('prof.show', $user->id) }}">{{ $user->last_name }}, {{ $user->first_name }} {{ $user->mi }}</a></td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->contact_number }}</td>
				<td>{{ date('M j, Y g:ia', strtotime($user->created_at)) }}</td>
				<td><a href="{{ route('faculty.show', $user->id) }}" class="btn btn-default"> Manage Subject</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>

    <!-- Add Faculty -->
	<div class="modal modal-center" id="addfaculty">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="fa fa-user-plus"></span> Add Faculty</h4>
                </div>
                <div class="modal-body">
                	{!! Form::open(['action' => 'RegistrationController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <!-- Full Name -->
                        <div class="row input-margin-top">
                            <div class="col-md-4">
                                <label name="first_name"> First Name</label>
                                <input type="text" name="first_name" placeholder="eg. Juan" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label name="mi"> Middle Name</label>
                                <input type="text" name="mi" placeholder="eg. Deguzman" class="form-control">
                            </div>
                            <div class="col-md-4">
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

                        <!-- Address -->
                        <div class="row input-margin-top">
                            <div class="col-md-12">
                                <label name="location"> Address</label>
                                <input type="text" name="location" placeholder="eg. # Street, City, Country" class="form-control">
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="row input-margin-top">
                            <div class="col-md-6">
                                <label name="contact_number"> Contact Number</label>
                                <input type="text" name="contact_number" placeholder="eg. 09## #### ###" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label name="alt_con"> Alternative Contact Number</label>
                                <input type="text" name="alt_con" placeholder="eg. 09## #### ###" class="form-control">
                            </div>
                        </div>


                        <!-- Password -->
                        <div class="row input-margin-top">
                            <div class="col-md-6">
                                <input type="password" name="password" value="password" class="form-control sub" readonly>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" value="password" class="form-control sub" readonly>
                            </div>
                        </div>

                        <!-- Profile & Background Picture-->
                            <div class="col-md-12">
                                <div class="sub">
	                                {{ Form::file('profile_picture', ['class' => 'form-control']) }}
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

    @include('components.coursemodal')

@endsection
@extends('layouts.main')

@section('content')
	<h2><span class="fa fa-plus"></span> Create Student <a href="{{ route('students.index') }}" class="btn btn-default pull-right"> Go Back</a></h2>
	<hr>
	<br>
	{!! Form::open(['action' => 'StudentController@store', 'method' => 'POST']) !!}
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						
						<!-- Student ID -->
						{{ Form::label('student_id', 'Student ID') }}
						{{ Form::text('student_id', '', ['class' => 'form-control', 'placeholder' => 'eg AB11-1-00111']) }}

						<!--Full Name -->
						<div class="row input-margin-top">
							<div class="col-md-6">
								{{ Form::label('first_name', 'First Name') }}
								{{ Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'eg. Juan']) }}
							</div>
							<div class="col-md-6">
								{{ Form::label('last_name', 'Last Name') }}
								{{ Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'eg. Juan']) }}
							</div>
						</div>

						<!-- Email -->
						<div class="input-margin-top">
							{{ Form::label('email', 'Email Address') }}
							{{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'eg. example@example.com']) }}
						</div>

						<!-- Course & Year-->
						<div class="row input-margin-top">
							<div class="col-md-6">
								<label name="course"> Course</label>
								{{ Form::select('course', [
								   'BSA' => 'BSA',
								   'BSBA' => 'BSBA',], '', ['class' => 'form-control']) }}
							</div>
							<div class="col-md-6">
								<label name="year"> Year</label>
								{{ Form::select('year', [
								   '1st' => 'First Year',
								   '2nd' => 'Second Year',
								   '3rd' => 'Third Year',
							   '4th' => 'Fourth Year',], '', ['class' => 'form-control']) }}
							</div>
						</div>

						<!-- Location -->
						<div class="input-margin-top">
							{{ Form::label('location', 'Location') }}
							{{ Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'eg. # subd., Street, City, Country']) }}
						</div>

						<!-- Sex & Contact Number -->
						<div class="row input-margin-top">
							<div class="col-md-6">
								<label name="sex"> Sex</label>
								{{ Form::select('sex', [
								   'Male' => 'Male',
								   'Female' => 'Female',], '', ['class' => 'form-control']) }}
							</div>
							<div class="col-md-6">
								{{ Form::label('contact_number', 'Contact Number') }}
								{{ Form::text('contact_number', '', ['class' => 'form-control', 'placeholder' => '09##-###-####']) }}
							</div>
						</div>

						<!-- Submit -->
						{{ Form::submit('Create Student', ['class' => 'btn btn-primary btn-block input-margin-top']) }}
					</div>
				</div>
			</div>
		</div>

	{!! Form::close() !!}

@endsection
@extends('layouts.main')

@section('content')
	<h2><span class="fa fa-graduation-cap"></span> Students <a href="{{ route('students.index') }}" class="btn btn-default pull-right"><span class="fa fa-plus"></span> Go Back</a></h2>
	<hr>
	<br>
    <div class="col-md-8 col-md-offset-2">
    	<div class="panel panel-default">
    		<div class="panel-body">
    			{!! Form::open(['action' => 'ProfileController@store', 'method' => 'POST']) !!}

				{{ Form::label('id', 'ID') }}
				{{ Form::text('id', $students->id, ['class' => 'form-control', 'readonly']) }}

				{{ Form::label('student_id', 'Student ID', ['class' => 'input-margin-top']) }}
				{{ Form::text('student_id', $students->student_id, ['class' => 'form-control', 'readonly']) }}

				{{ Form::label('name', 'Student Name', ['class' => 'input-margin-top']) }}
				{{ Form::text('name', $students->last_name.','.' '. $students->first_name, ['class' => 'form-control', 'readonly']) }}

				<div class="row input-margin-top">
					<div class="col-md-6">
						{{ Form::label('course', 'Course') }}
						{{ Form::text('course', $students->course, ['class' => 'form-control', 'readonly']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('year', 'Year Level') }}
						{{ Form::text('year', $students->year, ['class' => 'form-control', 'readonly']) }}
					</div>
				</div>

				{{ Form::label('facultysubject_id', 'Assign To...', ['class' => 'input-margin-top']) }}
				<select name="facultysubject_id" class="form-control">
					@foreach($facs as $fac)
					<option value="{{ $fac->id }}"> {{ $fac->subject_code }}: {{ $fac->subject_title }} by: {{ $fac->user->first_name }}</option>
					@endforeach
				</select>

				{{ Form::submit('Assign', ['class' => 'btn btn-success btn-block input-margin-top']) }}

				{!! Form::close() !!}
    		</div>
    	</div>
    </div>
@endsection
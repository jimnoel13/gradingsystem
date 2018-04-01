@extends('layouts.main')

@section('content')

	<h2><span class="fa fa-book"></span> Subjects <a href="{{ route('usersub.show', $subs->facultysubject_id) }}" class="btn btn-default pull-right"> Go Back</a></h2>
	<hr>
	<h4>{{auth()->user()->last_name}}, {{auth()->user()->first_name}}</h4>
	<h5><strong>Email:</strong> {{ auth()->user()->email }}</h5>
	<h5><strong>Location:</strong> {{ auth()->user()->location }}</h5>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<h4>{{ $subs->subject_title }}</h4>
			<h5><strong>Subject Code:</strong> {{ $subs->subject_code }}</h5>
		</div>
		<div class="col-md-6">
			<h4>{{ $subs->name }}</h4>
			<h5><strong>Student ID:</strong> {{ $subs->student_code }}</h5>
		</div>
	</div>
	<hr>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-body">
				{!! Form::open(['action' => ['UserController@update', $subs->id], 'method' => 'POST']) !!}
				{{ Form::text('facultyid', $subs->facultysubject_id, ['class' => 'no-border sub']) }}
				<div class="row">
					<div class="col-md-4">
						{{ Form::label('prelim', 'Prelim') }}
						{{ Form::text('prelim', $subs->prelim, ['class' => 'form-control', 'placeholder' => 'eg. 75']) }}
					</div>
					<div class="col-md-4">
						{{ Form::label('midterm', 'Midterm') }}
						{{ Form::text('midterm', $subs->midterm, ['class' => 'form-control', 'placeholder' => 'eg. 75']) }}
					</div>
					<div class="col-md-4">
						{{ Form::label('final', 'Final') }}
						{{ Form::text('final', $subs->final, ['class' => 'form-control', 'placeholder' => 'eg. 75']) }}
					</div>
				</div>
				
				{{ Form::hidden('_method', 'PUT') }}
                {{  Form::submit('Encode', ['class' => 'btn btn-success btn-block input-margin-top']) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>



@endsection
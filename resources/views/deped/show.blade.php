@extends('layouts.main')

@section('content')
	<h2><img src="{{ asset('images/deped-logo.png') }}"> DepEd <a href="{{ route('deped.index') }}" class="btn btn-default pull-right">Go Back</a></h2>
	<br>
	<h3 class="text-center"> Department of Education</h3>
	<hr>
	<h4>{{ $subjects->subject_code }} - {{ $subjects->subject_title }}</h4>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Course Code</th>
				<th>Subject Title</th>
				<th>School Department</th>
				<th>Units</th>
				<th>Semester</th>
				<th>Faculty</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			{!! Form::open(['action' => 'FacultySubjectController@store', 'method' => 'POST']) !!}
			<tr>
				<td></td>
				<td><input type="text" name="subject_code" value="{{ $subjects->subject_code }}" class="form-control" readonly></td>
				<td><input type="text" name="subject_title" value="{{ $subjects->subject_title }}" class="form-control" readonly></td>
				<td><input type="text" name="school_dept" value="{{ $subjects->school_dept }}" class="form-control" readonly></td>
				<td><input type="text" name="units" value="{{ $subjects->units }}" class="form-control" readonly></td>
				<td><select name="semester" class="form-control">
					<option value="None"> None</option>
					<option value="1st"> First</option>
					<option value="2nd"> Second</option>
					<option value="3rd"> Third</option>
					</select></td>
				<td><select name="user_id" class="form-control">
						@foreach($users as $user)
						<option value="{{ $user->id }}"> {{ $user->first_name }} {{ $user->last_name }}</option>
						@endforeach
						</select></td>
				<td>{{ Form::submit('Assign Subject', ['class' => 'btn btn-success']) }}</td>
			</tr>
			{!! Form::close() !!}
		</tbody>
	</table>
@endsection
@extends('layouts.main')

@section('content')

	<h2><span class="fa fa-graduation-cap"></span> Students <a href="{{ route('students.index') }}" class="btn btn-default pull-right"> Go Back</a></h2>
	<hr>
	<h4>{{ $students->last_name }}, {{ $students->first_name }}</h4>
	<h5><strong>Student ID:</strong> {{ $students->student_id }}</h5>
	<h5><strong>Course:</strong> {{ $students->course }}</h5>
	<hr>
	<br>
	<h3><span class="fa fa-list"></span> Grades <a href="{{ route('studentgrade.show', $students->id) }}" class="btn btn-default pull-right"> Print Preview</a></h3>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Subject Code</th>
				<th>Subject Title</th>
				<th>Semester</th>
				<th>Prelim</th>
				<th>Midterm</th>
				<th>Final</th>
				<th>Rating</th>
				<th>Remarks</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($students->stusub as $subs)
			<tr>
				<td></td>
				<td>{{ $subs->subject_code }}</td>
				<td>{{ $subs->subject_title }}</td>
				<td>{{ $subs->semester }}</td>
				<td>{{ $subs->prelim }}</td>
				<td>{{ $subs->midterm }}</td>
				<td>{{ $subs->final }}</td>
				<td>{{ $subs->rating }}</td>
				<td>{{ $subs->remarks }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	@include('components.coursemodal')
@endsection
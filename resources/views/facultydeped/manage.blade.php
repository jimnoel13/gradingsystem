@extends('layouts.main')

@section('content')
	<h2><img src="{{ asset('images/st-therese-logo.jpg') }}"> Faculty <a href="{{ route('depedassign.show', $facs->user->id) }}" class="btn btn-default pull-right">Go Back</a></h2>
		<hr>
	<h4>{{ $facs->user->first_name }} {{ $facs->user->last_name }}</h4>
	<h5><strong>Email:</strong> {{ $facs->user->email }}</h5>
	<h5><strong>Location:</strong> {{ $facs->user->location }}</h5>
	<hr>
	<h4>{{$facs->subject_title}}</h4>
	<h5><strong>Course Code:</strong> {{ $facs->subject_code }}</h5>
	<h5><strong>Semester:</strong> {{ $facs->semester }}</h5>
	<p>{{ Form::text('schooldept', $facs->school_dept, ['class' => 'no-border sub']) }}</p>
	<hr>
	<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#students"> Assign Student</a>
	<h4>Assign Students <a href="{{ route('print.show', $facs->id) }}" class="btn btn-default pull-right">Print Preview</a></h4>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>Course</th>
				<th>Year</th>
				<th>Date Assigned</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($facs->stusub as $stusub)
			<tr>
				<td></td>
				<td>{{ $stusub->student_code }}</td>
				<td>{{ $stusub->name }}</td>
				<td>{{ $stusub->course }}</td>
				<td>{{ $stusub->year }}</td>
				<td>{{ date('M j, Y', strtotime($stusub->created_at)) }}</td>
				<td>{!! Form::open(['action'=>['ProfileController@destroy', $stusub->id],'method'=>'POST']) !!}
							{{ Form::hidden('_method','DELETE') }}
							{{ Form::submit('Remove', ['class'=>'btn btn-danger']) }}
 						{!! Form::close() !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<hr>
	<br>


	<!-- To Be Assigned Student Modal -->
	<div class="modal" id="students">
        <div class="modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                	<h4>List of Students</h4>
					<br>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Student ID</th>
								<th>Student Name</th>
								<th>course</th>
								<th>Year Level</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($students as $student)
							{!! Form::open(['action' => 'GradeController@store', 'method' => 'POST']) !!}
							{{ Form::text('subject_title', $facs->subject_title, ['class' => 'no-border sub', 'readonly']) }}
							{{ Form::text('subject_code', $facs->subject_code, ['class' => 'no-border sub', 'readonly']) }}
							{{ Form::text('facultysubject_id', $facs->id, ['class' => 'no-border sub', 'readonly']) }}
							{{ Form::text('semester', $facs->semester, ['class' => 'no-border sub', 'readonly']) }}
							{{ Form::text('school_dept', $facs->school_dept, ['class' => 'no-border sub', 'readonly']) }}
							<tr>
								<td>{{ Form::text('student_id', $student->id, ['class' => 'no-border sub', 'readonly']) }}</td>
								<td>{{ Form::text('student_code', $student->student_id, ['class' => 'no-border0', 'readonly']) }}</td>
								<td>{{ Form::text('name', $student->last_name.','.' '. $student->first_name, ['class' => 'no-border0', 'readonly']) }}</td>
								<td>{{ Form::text('course', $student->course, ['class' => 'no-border2', 'readonly']) }}</td>
								<td>{{ Form::text('year', $student->year, ['class' => 'no-border', 'readonly']) }}</td>
								<td>{{ Form::submit('Assign', ['class' => 'btn btn-success']) }}</td>
							</tr>
							{!! Form::close() !!}
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div> <!-- End of To Be Assigned Student Modal -->
 @endsection
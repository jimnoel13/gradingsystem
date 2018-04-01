@extends('layouts.main')

@section('content')
	<h2><img src="{{ asset('images/ched-logo.png') }}"> CHEd <a href="#" data-toggle="modal" data-target="#addched" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Create Subject</a></h2>
	<br>
	<h3 class="text-center"> Commission on Higher Education</h3>
	<hr>
	<br>
	<table class="table table-hover" id="subject_table">
		<thead>
			<tr>
				<th></th>
				<th>Course Code</th>
				<th>Subject Title</th>
				<th>Units</th>
				<th>Created At</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($subjects as $subject)
			<tr>
				<td></td>
				<td>{{ $subject->subject_code }}</td>
				<td>{{ $subject->subject_title }}</td>
				<td>{{ $subject->units }}</td>
				<td>{{ date('M j, Y g:ia', strtotime($subject->created_at)) }}</td>
				<td><a href="" data-toggle="modal" data-target="#edit-{{ $subject->id }}" class="btn btn-primary btn-block">Edit</a></td>
				<td>{!! Form::open(['action'=>['SubjectController@destroy', $subject->id],'method'=>'POST']) !!}
							{{ Form::hidden('_method','DELETE') }}
							{{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
					{!! Form::close() !!}</td>
			</tr>

			<!-- Subject Edit -->
			<div class="modal modal-center" id="edit-{{ $subject->id }}" tabindex="-1">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <h4 class="modal-title"><span class="fa fa-edit"></span> Edit Subject</h4>
		                </div>
		                <div class="modal-body">
		                	{!! Form::open(['action' => ['SubjectController@update', $subject->id], 'method' => 'POST']) !!}
								
								{{ Form::label('subject_code', 'Course Code') }}
								{{ Form::text('subject_code', $subject->subject_code, ['class' => 'form-control']) }}

								{{ Form::label('subject_title', 'Subject Title', ['class' => 'input-margin-top']) }}
								{{ Form::text('subject_title', $subject->subject_title, ['class' => 'form-control']) }}

								{{ Form::label('units', 'Units', ['class' => 'input-margin-top']) }}
								{{ Form::text('units', $subject->units, ['class' => 'form-control']) }}

								{{ Form::hidden('_method','PUT') }}
								{{ Form::submit('Update', ['class' => 'btn btn-success btn-block input-margin-top']) }}

		                	{!! Form::close(); !!}
		                </div>
		            </div>
		        </div>
		    </div><!-- End of Subject Edit -->

			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{{ $subjects->links() }}
	</div>


	<!-- Create Subject Modal -->
	<div class="modal modal-center" id="addched">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="fa fa-plus"></span> Create Subject</h4>
                </div>
                <div class="modal-body">
                	{!! Form::open(['action' => 'SubjectController@store', 'method' => 'POST']) !!}

					<!-- School Department -->
					{{ Form::text('school_dept', 'CHEd', ['class' => 'sub']) }}

					<!-- Subject Code -->
					{{ Form::label('subject_code', 'Course Code') }}
					<input type="text" name="subject_code" class="form-control" placeholder="eg. SUB 1">

					<!-- Subject Title -->
					{{ Form::label('subject_title', 'Subject Title', ['class' => 'input-margin-top']) }}
					{{ Form::textarea('subject_title', '', ['class' => 'form-control', 'placeholder' => 'eg. Subject 1']) }}

					<!-- Units -->
					{{ Form::label('units', 'Units', ['class' => 'input-margin-top']) }}
					{{ Form::text('units', '', ['class' => 'form-control', 'placeholder' => 'eg. 1']) }}
					{{ Form::submit('Create', ['class' => 'btn btn-primary btn-block input-margin-top']) }}

					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

	@include('components.coursemodal')
@endsection
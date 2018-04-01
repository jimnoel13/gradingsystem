@extends('layouts.main')

@section('content')
	<h2><span class="fa fa-graduation-cap"></span> Students <a href="#" data-toggle="modal" data-target="#addstudent" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Add Student</a></h2>
	<hr>
	<br>
	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th></th>
					<th>Student ID</th>
					<th>Name</th>
					<th>Course</th>
					<th>Year</th>
					<th>Created At</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($students as $student)
				<tr>
					<td></td>
					<td>{{ $student->student_id }}</td>
					<td>{{ $student->last_name }}, {{ $student->first_name }}</td>
					<td>{{ $student->course }}</td>
					<td>{{ $student->year }}</td>
					<td>{{ date('M j, Y', strtotime($student->created_at)) }}</td>
					<td><a href="{{ route('grades.show', $student->id) }}" class="btn btn-default"><span class="fa fa-list"></span> Grades</a></td>
					<td><a href="#" data-toggle="modal" data-target="#edit-{{ $student->id }}" class="btn btn-primary btn-block">Edit</a></td>
					<td></a>{!! Form::open(['action'=>['StudentController@destroy', $student->id],'method'=>'POST']) !!}
							{{ Form::hidden('_method','DELETE') }}
							{{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
 						{!! Form::close() !!}</td>
				</tr>

				<!-- Student Edit Modal -->
				<div class="modal modal-center" id="edit-{{ $student->id }}" tabindex="-1">
			        <div class="modal-dialog">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h4 class="modal-title"><span class="fa fa-edit"></span> Student Edit</h4>
			                </div>
			                <div class="modal-body">
			                	
			                {!! Form::open(['action' => ['StudentGradeController@update', $student->id], 'method' => 'POST']) !!}
								{{ Form::label('student_code', 'Student ID') }}
								{{ Form::text('student_code', $student->student_id, ['class' => 'form-control']) }}

								<div class="row input-margin-top">
									<div class="col-md-6">
										{{ Form::label('first_name', 'First Name') }}
										{{ Form::text('first_name', $student->first_name, ['class' => 'form-control']) }}
									</div>
									<div class="col-md-6">
										{{ Form::label('last_name', 'Last Name') }}
										{{ Form::text('last_name', $student->last_name, ['class' => 'form-control']) }}
									</div>
								</div>

								{{ Form::label('email', 'Email', ['class' => 'input-margin-top']) }}
								{{ Form::text('email', $student->email, ['class' => 'form-control']) }}

								{{ Form::label('location', 'Address', ['class' => 'input-margin-top']) }}
								{{ Form::text('location', $student->location, ['class' => 'form-control']) }}

								{{ Form::label('contact_number', 'Contact Number', ['class' => 'input-margin-top']) }}
								{{ Form::text('contact_number', $student->contact_number, ['class' => 'form-control']) }}

								<div class="row input-margin-top">
									<div class="col-md-4">
										{{ Form::label('course', 'Course', ['class' => 'input-margin-top']) }}
										<select name="course" class="form-control">
											<option value="{{ $student->course }}">{{ $student->course }}</option>
											@foreach($course as $co)
											<option value="{{ $co->course }}">{{ $co->course }}</option>
											@endforeach
										</select>										
									</div>
									<div class="col-md-4">
										{{ Form::label('year', 'Year Level', ['class' => 'input-margin-top']) }}
										{{ Form::select('year',['1st' => '1st',
										                        '2nd' => '2nd',
										                        '3rd' => '3rd',
										                        '4th' => '4th'], $student->year, ['class' => 'form-control']) }}
									</div>
									<div class="col-md-4">
										{{ Form::label('sex', 'Sex', ['class' => 'input-margin-top']) }}
										{{ Form::select('sex',['Male' => 'Male',
										                       'Female' => 'Female'], $student->sex, ['class' => 'form-control']) }}
									</div>
				                </div>
								{{ Form::hidden('_method','PUT') }}
				                {{ Form::submit('Update Information', ['class' => 'btn btn-success btn-block input-margin-top']) }}
							
							{!! Form::close(); !!}

			            </div>
			        </div>
			    </div>

				@endforeach
			</tbody>
		</table>
			<div class="text-center">
	 			{!! $students->links(); !!}
	 		</div>
 		</div>

	@include('components.coursemodal')


	 <!-- Student Create Modal -->
	 <div class="modal modal-center" id="addstudent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="fa fa-user-plus"></span> Add Student</h4>
                </div>
                <div class="modal-body">
                	{!! Form::open(['action' => 'StudentController@store', 'method' => 'POST']) !!}
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
								<select name="course" class="form-control">
									@foreach($course as $co)
									<option value="{{ $co->course }}">{{ $co->course }}</option>
									@endforeach
								</select>
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
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
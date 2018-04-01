@extends('layouts.main')

@section('content')
	
	<h2><img src="{{ asset('images/st-therese-logo.jpg') }}"> Faculty <a href="{{ route('faculty.index') }}" class="btn btn-default pull-right">Go Back</a></h2>
	<hr>
	<h4>{{ $users->first_name }} {{ $users->mi }} {{ $users->last_name }}</h4>
	<h5><strong>Email:</strong> {{ $users->email }}</h5>
	<h5><strong>Location:</strong> {{ $users->location }}</h5>
	<hr>
	<div class="btn-group btn-group-justified">
	  <a href="{{ route('faculty.show', $users->id) }}" class="btn btn-default"><img id="btn-group-img" src="{{ asset('images/ched-logo.png') }}"> <strong>CHEd</strong></a>
	  <a href="{{ route('depedassign.show', $users->id) }}" class="btn btn-default active"><img id="btn-group-img" src="{{ asset('images/deped-logo.png') }}"> <strong>DepEd</strong></a>
	  <a href="{{ route('tesdaassign.show', $users->id) }}" class="btn btn-default"><img id="btn-group-img" src="{{ asset('images/tesda-logo.png') }}"> <strong>TESDA</strong></a>
	</div>
	<br>
	<h4>Assined Subjects</h4>
	<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#subjects"> Assign Subject</a>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Course Code</th>
				<th>Subject Title</th>
				<th>Units</th>
				<th>Semester</th>
				<th>Assigned On</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users->assign as $assign)
			<tr>
				@if($assign->school_dept == 'DepEd')
				<td></td>
				<td>{{ $assign->subject_code }}</td>
				<td>{{ $assign->subject_title }}</td>
				<td>{{ $assign->units }}</td>
				<td>{{ $assign->semester }}</td>
				<td>{{ date('M j, Y', strtotime($assign->created_at)) }}</td>
				<td><a href="{{ route('depedmanage.show', $assign->id) }}" class="btn btn-default btn-block"> Manage Student</a></td>
				<td>{!! Form::open(['action'=>['FacultySubjectController@destroy', $assign->id],'method'=>'POST']) !!}
							{{ Form::hidden('_method','DELETE') }}
							{{ Form::submit('Remove', ['class'=>'btn btn-danger btn-block']) }}
 					{!! Form::close() !!}</td>
			</tr>
 			@endif
			@endforeach
		</tbody>
	</table>
	<br>
	<hr>
	<br>

	@include('components.coursemodal')

	<!-- Subjects Assignment Modal -->
	<div class="modal" id="subjects">
        <div class="modal-lg">
            <div class="modal-content">
                <div class="modal-body">

					<h4><img src="{{ asset('images/deped-logo.png') }}"> List of DepEd Subjects</h4>
					<br>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th></th>
									<th>Course Code</th>
									<th>Subject Title</th>
									<th>Units</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($subjects as $subject)
								{{ Form::text('user_id', $users->id, ['class' => 'sub']) }}
								<tr>
									<td>{{ Form::text('school_dept', $subject->school_dept, ['class' => 'sub']) }}</td>
									<td>{{ Form::text('subject_code', $subject->subject_code, ['class' => 'no-border', 'readonly']) }}</td>
									<td>{{ Form::text('subject_title', $subject->subject_title, ['class' => 'no-border3', 'readonly']) }}</td>
									<td>{{ Form::text('units', $subject->units, ['class' => 'no-border', 'readonly']) }}</td>
									{{-- <td><select name="course" class="form-control">
										<option value="None">None</option>
										@foreach($courses as $co)
										<option value="{{ $co->course }}">{{ $co->course }}</option>
										@endforeach
									</select></td>
									<td>{{ Form::select('semester', ['First' => 'First',
								                                     'Second' => 'Second',
								                                     'Third' => 'Third'], '', ['class' => 'form-control']) }}</td>
								    <td>{{ Form::select('day', ['Monday' => 'Monday',
						                                        'Tuesday' => 'Tuesday',
						                                        'Wednesday' => 'Wednesday',
						                                        'Thursday' => 'Thursday',
						                                        'Friday' => 'Friday',
						                                        'Saturday' => 'Saturday'], '', ['class' => 'form-control']) }} /
	                                    {{ Form::select('day1', ['' => '',
	                                    						'Monday' => 'Monday',
						                                        'Tuesday' => 'Tuesday',
						                                        'Wednesday' => 'Wednesday',
						                                        'Thursday' => 'Thursday',
						                                        'Friday' => 'Friday',
						                                        'Saturday' => 'Saturday'], '', ['class' => 'form-control']) }}/
	                                    {{ Form::select('day2', ['' => '',
	                                    						'Monday' => 'Monday',
						                                        'Tuesday' => 'Tuesday',
						                                        'Wednesday' => 'Wednesday',
						                                        'Thursday' => 'Thursday',
						                                        'Friday' => 'Friday',
						                                        'Saturday' => 'Saturday'], '', ['class' => 'form-control']) }}</td>
									<td>From: {{ Form::select('year', [''=>'',
																	   '2017' => '2017',
																	   '2018' => '2018',
																	   '2019' => '2019',
																	   '2020' => '2020',
																	   '2021' => '2021',
																	   '2022' => '2022',
																	   '2023' => '2023',
																	   '2024' => '2024',
																	   '2025' => '2025',
																	   '2026' => '2026',
																	   '2027' => '2027',
																	   '2028' => '2028',
																	   '2029' => '2029',
																	   '2030' => '2030',
																	   '2031' => '2031',
																	   '2032' => '2032',
																	   '2033' => '2033',
																	   '2034' => '2034',
																	   '2035' => '2035',
																	   '2036' => '2036',
																	   '2037' => '2037',
																	   '2038' => '2038',
																	   '2039' => '2039',
																	   '2040' => '2040',
																	   '2041' => '2041',
																	   '2042' => '2042',
																	   '2043' => '2043',
																	   '2044' => '2044',
																	   '2045' => '2045',
																	   '2046' => '2046',
																	   '2047' => '2047',
																	   '2048' => '2048',
																	   '2049' => '2049',
																	   '2050' => '2050'], '', ['class' => 'form-control']) }}
										To: {{ Form::select('to', [''=>'',
																   '2017' => '2017',
																   '2018' => '2018',
																   '2019' => '2019',
																   '2020' => '2020',
																   '2021' => '2021',
																   '2022' => '2022',
																   '2023' => '2023',
																   '2024' => '2024',
																   '2025' => '2025',
																   '2026' => '2026',	
																   '2027' => '2027',
																   '2028' => '2028',
																   '2029' => '2029',
																   '2030' => '2030',
																   '2031' => '2031',
																   '2032' => '2032',
																   '2033' => '2033',
																   '2034' => '2034',
																   '2035' => '2035',
																   '2036' => '2036',
																   '2037' => '2037',
																   '2038' => '2038',
																   '2039' => '2039',
																   '2040' => '2040',
																   '2041' => '2041',
																   '2042' => '2042',
																   '2043' => '2043',
																   '2044' => '2044',
																   '2045' => '2045',
																   '2046' => '2046',
																   '2047' => '2047',
																   '2048' => '2048',
																   '2049' => '2049',
																   '2050' => '2050'], '', ['class' => 'form-control']) }}</td> --}}
									<td><a href="#" data-toggle="modal" data-target="#depedassign-{{ $subject->id }}" class="btn btn-success btn-block"> Assign</a></td>

								</tr>

								<!-- Subject Assign Modal -->
								<div class="modal modal-center" id="depedassign-{{ $subject->id }}" tabindex="-1">
							        <div class="modal-dialog">
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h4 class="modal-title"><span class="fa fa-edit"></span> Edit Subject</h4>
							                </div>
							                <div class="modal-body">
											{!! Form::open(['action' => 'FacultySubjectController@store', 'method' => 'POST']) !!}

							                	{{ Form::text('user_id', $users->id, ['class' => 'sub']) }}
												{{ Form::text('school_dept', $subject->school_dept, ['class' => 'sub']) }}
												<div class="row">
													<div class="col-md-4">
														{{ Form::label('subject_code', 'Subject Code') }}
														{{ Form::text('subject_code', $subject->subject_code, ['class' => 'form-control', 'readonly']) }}
													</div>
													<div class="col-md-4">
														{{ Form::label('subject_title', 'Subject Title') }}
														{{ Form::text('subject_title', $subject->subject_title, ['class' => 'form-control', 'readonly']) }}
													</div>
													<div class="col-md-4">
														{{ Form::label('units', 'Units') }}
														{{ Form::text('units', $subject->units, ['class' => 'form-control', 'readonly']) }}
													</div>
												</div>

												{{ Form::label('course', 'Course') }}
												<select name="course" class="form-control input-margin-top">
													@foreach($course as $co)
													<option value="{{ $co->course }}">{{ $co->course }}</option>
													@endforeach
												</select>

												<div class="row input-margin-top">
													<div class="col-md-4">
														{{ Form::label('day', 'Day') }}
														{{ Form::select('day', ['' => '',
																				'Monday' => 'Monday',
																				'Tuesday' => 'Tuesday',
																				'Wednesday' => 'Wednesday',
																				'Thursday' => 'Thursday',
																				'Friday' => 'Friday',
																				'Saturday' => 'Saturday'], '', ['class' => 'form-control']) }}
													</div>
													<div class="col-md-4">
														{{ Form::label('day1', 'Day') }}
														{{ Form::select('day1', ['' => '',
																				'Monday' => 'Monday',
																				'Tuesday' => 'Tuesday',
																				'Wednesday' => 'Wednesday',
																				'Thursday' => 'Thursday',
																				'Friday' => 'Friday',
																				'Saturday' => 'Saturday'], '', ['class' => 'form-control']) }}
													</div>
													<div class="col-md-4">
														{{ Form::label('day2', 'Day') }}
														{{ Form::select('day2', ['' => '',
																				'Monday' => 'Monday',
																				'Tuesday' => 'Tuesday',
																				'Wednesday' => 'Wednesday',
																				'Thursday' => 'Thursday',
																				'Friday' => 'Friday',
																				'Saturday' => 'Saturday'], '', ['class' => 'form-control']) }}
													</div>
												</div>

												<div class="row input-margin-top">
													<div class="col-md-6">
														{{ Form::label('year', 'Year') }}
														{{ Form::select('year', [''=>'',
																	   '2017' => '2017',
																	   '2018' => '2018',
																	   '2019' => '2019',
																	   '2020' => '2020',
																	   '2021' => '2021',
																	   '2022' => '2022',
																	   '2023' => '2023',
																	   '2024' => '2024',
																	   '2025' => '2025',
																	   '2026' => '2026',
																	   '2027' => '2027',
																	   '2028' => '2028',
																	   '2029' => '2029',
																	   '2030' => '2030',
																	   '2031' => '2031',
																	   '2032' => '2032',
																	   '2033' => '2033',
																	   '2034' => '2034',
																	   '2035' => '2035',
																	   '2036' => '2036',
																	   '2037' => '2037',
																	   '2038' => '2038',
																	   '2039' => '2039',
																	   '2040' => '2040',
																	   '2041' => '2041',
																	   '2042' => '2042',
																	   '2043' => '2043',
																	   '2044' => '2044',
																	   '2045' => '2045',
																	   '2046' => '2046',
																	   '2047' => '2047',
																	   '2048' => '2048',
																	   '2049' => '2049',
																	   '2050' => '2050'], '', ['class' => 'form-control']) }}
													</div>
													<div class="col-md-6">
														{{ Form::label('to', 'To') }}
														{{ Form::select('to', [''=>'',
																	   '2017' => '2017',
																	   '2018' => '2018',
																	   '2019' => '2019',
																	   '2020' => '2020',
																	   '2021' => '2021',
																	   '2022' => '2022',
																	   '2023' => '2023',
																	   '2024' => '2024',
																	   '2025' => '2025',
																	   '2026' => '2026',
																	   '2027' => '2027',
																	   '2028' => '2028',
																	   '2029' => '2029',
																	   '2030' => '2030',
																	   '2031' => '2031',
																	   '2032' => '2032',
																	   '2033' => '2033',
																	   '2034' => '2034',
																	   '2035' => '2035',
																	   '2036' => '2036',
																	   '2037' => '2037',
																	   '2038' => '2038',
																	   '2039' => '2039',
																	   '2040' => '2040',
																	   '2041' => '2041',
																	   '2042' => '2042',
																	   '2043' => '2043',
																	   '2044' => '2044',
																	   '2045' => '2045',
																	   '2046' => '2046',
																	   '2047' => '2047',
																	   '2048' => '2048',
																	   '2049' => '2049',
																	   '2050' => '2050'], '', ['class' => 'form-control']) }}
													</div>
												</div>
												
												{{ Form::label('semester', 'Semester', ['class' => 'input-margin-top']) }}
												{{ Form::select('semester', ['First' => 'First',
								                                     'Second' => 'Second',
								                                     'Third' => 'Third'], '', ['class' => 'form-control']) }}

								                {{ Form::submit('Assign Subject', ['class' => 'btn btn-success btn-block input-margin-top']) }}
												{!! Form::close(); !!}
							                </div>
							            </div>
							        </div>
						    </div><!-- End of Subject Edit -->
								@endforeach
							</tbody>
						</table>

                    </div>
                </div>
            </div>
        </div> <!-- End Subjects Assignment Modal -->
@endsection
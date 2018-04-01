<!-- Courses Lists -->
		<div class="modal modal-center" id="co">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h4 class="modal-title"><span class="fa fa-times-circle"></span> Delete Course <a href="#" data-toggle="modal" data-target="#addco" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Add Course</a></h4>
	                </div>
	                <div class="modal-body">
	                	<table class="table table-bordered">
	                		<thead>
		                		<tr>
		                			<th>Courses</th>
		                			<th>Created At</th>
		                			<th>Action</th>
		                		</tr>
	                		</thead>
	                	
	                	@foreach($course as $co)
	                		<tbody>
	                			<tr>
	                				<td>{{ $co->course }}</td>
	                				<td>{{ date('M j, Y g:ia', strtotime($co->created_at)) }}</td>
	                				<td>{!! Form::open(['action' => ['CourseController@destroy', $co->id], 'method' => 'POST']) !!}
	                						{{ Form::hidden('_method', 'DELETE') }}
	                						{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
	                					{!! Form::close(); !!}</td>
	                			</tr>
	                		</tbody>
	                	@endforeach
	                	</table>
	                </div>
	            </div>
	        </div>
    	</div>

		<!-- Add Course Modal -->
    	<div class="modal modal-center" id="addco">
	        <div class="modal-dialog">	
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h4 class="modal-title"><span class="fa fa-plus"></span> Add Course</h4>
	                </div>
	                <div class="modal-body">

						{!! Form::open(['action' => 'CourseController@store', 'method' => 'POST']) !!}
					 				<div class="text-center">
					 					{{ Form::label('course', 'Course') }}
					 					{{ Form::text('course', '', ['class' => 'form-control']) }}
					 				</div>
					 				<br>
					 				<input type="submit" value="Add" class="btn btn-success btn-block">
				 		{!! Form::close(); !!}

	                </div>
	            </div>
	        </div>
	    </div>
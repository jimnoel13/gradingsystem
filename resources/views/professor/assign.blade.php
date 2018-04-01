@extends('layouts.main')

@section('content')

	<h2><span class="fa fa-book"></span> Subjects <a href="{{ route('usersub.index') }}" class="btn btn-default pull-right"> Go Back</a></h2>
	<hr>
	<h4>{{ $facs->subject_title }}</h4>
	<h5><strong>Subject Code:</strong> {{ $facs->subject_code }}</h5>
	<h5><strong>Semester:</strong> {{ $facs->semester }}</h5>
	<hr>
	<h3><span class="fa fa-users"></span> Students <a href="{{ route('faculty.print', $facs->id) }}" class="btn btn-default pull-right"><span class="fa fa-file"></span> Print Preview</a> 
	<div class="btn-group">
		<button type="button" class="btn btn-info"><span class="fa fa-copy"></span> Export</button>
		<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only">Togglee Dropdown</span>
		</button>
		<ul class="dropdown-menu" role="menu" id="export-menu">
			<li id="export-to-excel"><a href="{{ route('getExport') }}">Export To Excel</a></li>
		</ul>
	</div>
	</h3>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Student Name</th>
				<th class="text-center">PRELIM</th>
				<th class="text-center">MIDTERM</th>
				<th class="text-center">FINAL</th>
				<th class="text-center">AVERAGE</th>
				<th class="text-center">RATING</th>
				<th class="text-center">REMARKS</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($facs->stusub as $subs)
			<tr>
				{!! Form::open(['action' => ['UserController@update', $subs->id], 'method' => 'POST']) !!}
				<td>{{$subs->student_code}}</td>
				<td>{{ $subs->name }}</td>
				<td>{{ Form::text('prelim', $subs->prelim, ['class' => 'no-border']) }}</td>
				<td>{{ Form::text('midterm', $subs->midterm, ['class' => 'no-border']) }}</td>
				<td>{{ Form::text('final', $subs->final, ['class' => 'no-border']) }}</td>
				<td>{{ number_format($subs->average, 2) }}</td>
				<td>{{ $subs->rating }}</td>
				<td>{{ $subs->remarks }} <a href="#" data-toggle="modal" data-target="#remark-{{ $subs->id }}" class="btn btn-default btn-sm pull-right">...</a></td>
				<td>@if(empty($subs->remarks))
						{{ Form::hidden('_method', 'PUT') }}
				    {{  Form::submit('Encode', ['class' => 'btn btn-success btn-block']) }}
					@else
						{{ Form::hidden('_method', 'PUT') }}
					{{  Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
					@endif</td>
				{!! Form::close() !!}
			</tr>


			<!-- Remarks Modal -->
			<div class="modal modal-center" id="remark-{{ $subs->id }}" tabindex="-1">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <h4 class="modal-title"><span class="fa fa-gavel"></span> REMARKS</h4>
		                </div>
		                <div class="modal-body">
		                	
		                	{!! Form::open(['action' => ['RemarkController@update', $subs->id], 'method' => 'POST']) !!}
							{{ Form::select('remarks', ['UW' => 'Unauthorized Withdrawal',
														'DRP' => 'DROPPED'], '', ['class' => 'form-control']) }}

							{{ Form::hidden('_method', 'PUT') }}
							{{ Form::submit('Update', ['class' => 'btn btn-success btn-block input-margin-top']) }}
							{!! Form::close(); !!}

		                </div>
		            </div>
		        </div>
		    </div>
			@endforeach
		</tbody>
	</table>

@endsection
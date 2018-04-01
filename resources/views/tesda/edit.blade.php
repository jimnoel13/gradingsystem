@extends('layouts.main')

@section('content')
	<h2><img src="{{ asset('images/tesda-logo.png') }}"> TESDA</h2>
	<br>
	<h3 class="text-center"> Technical Education and Skills Development Authority</h3>
	<hr>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Course Code</th>
				<th>Subject Title</th>
				<th>Units</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				{!! Form::open(['route' => ['tesda.update', $subjects->id], 'method' => 'POST']) !!}
				<td></td>
				<td>{{ Form::text('subject_code', $subjects->subject_code, ['class' => 'form-control']) }}</td>
				<td>{{ Form::text('subject_title', $subjects->subject_title, ['class' => 'form-control']) }}</td>
				<td>{{ Form::select('units', [
							   '6' => '6',
							   '3' => '3',
							   '2' => '2',
							   '1' => '1',
							   'None' => 'None',
							   '-3' => '-3',], $subjects->units, ['class' => 'form-control']) }}</td>
				<td><a href="{{ route('tesda.index') }}" class="btn btn-default">Cancel</a>
					{{ Form::hidden('_method','PUT') }}
					{{ Form::submit('Save Changes', ['class'=>'btn btn-success']) }}</td>
				{!! Form::close() !!}
			</tr>
		</tbody>
	</table>
@endsection
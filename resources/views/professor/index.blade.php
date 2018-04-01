@extends('layouts.main')

@section('content')
	
	<h2><span class="fa fa-book"></span> Subjects</h2>
	<hr>
	<br>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="text-center">Subject Code</th>
				<th class="text-center">Subject Title</th>
				<th class="text-center">School Department</th>
				<th class="text-center">Semester</th>
				<th class="text-center">Units</th>
				<th class="text-center">Assigned On</th>
				<th class="text-center">Operation</th>
			</tr>
		</thead>
		<tbody>
			@foreach($assign as $ass)
			<tr>
				<td class="text-center">{{ $ass->subject_code }}</td>
				<td class="text-center">{{ $ass->subject_title }}</td>
				<td class="text-center">{{ $ass->school_dept }}</td>
				<td class="text-center">{{ $ass->semester }}</td>
				<td class="text-center">{{ $ass->units }}</td>
				<td class="text-center">{{ date('M j, Y', strtotime($ass->created_at)) }}</td>
				<td class="text-center"><a href="{{ route('usersub.show', $ass->id) }}" class="btn btn-default"> Manage Student</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection
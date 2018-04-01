@extends('layouts.user')

@section('profile')
<div class="row">
	<div class="col-md-3 margin-left">
		<div class="well">
			<div class="text-center">
				<img id="profile" src="/storage/cover_images/{{ $users->profile_picture }}">
				<h3>{{ $users->first_name }} {{ $users->last_name }}</h3>
				<hr>

				<!-- Email -->
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Email</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $users->email }}</td>
						</tr>
					</tbody>
				</table>

				<!-- Contact Number -->
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Contact Number</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $users->contact_number }} @if(!empty($users->alt_con))
								/{{ $users->alt_con }}
							@endif</td>
						</tr>
					</tbody>
				</table>

				<!-- Location -->
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Location</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $users->location }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Personal Biography -->
	<div class="col-md-8">
		<div class="well">
			<h3><span class="fa fa-user-circle"></span> Personal Biography <a href="{{ route('faculty.index') }}" class="btn btn-default pull-right"> Go Back</a></h3>
			<hr>

			<!-- Who Am I -->
			<table class="table">
				<thead>
					<tr>
						<th class="text-center"><h3>About You</h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">{{ $users->bio->who }}</td>
					</tr>
				</tbody>
			</table>
			<br>

			<!--Educational Attainment -->
			<h5 class="text-center"><strong><h3>Educational Attainment:</h3></strong></h5>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Elementary</th>
						<th>Highschool</th>
						<th>College</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $users->bio->elementary }}</td>
						<td>{{ $users->bio->highschool }}</td>
						<td>{{ $users->bio->college }}</td>
					</tr>
				</tbody>
			</table>
			<br>

			<!-- Biography -->
			<table class="table">
				<thead>
					<tr>
						<th class="text-center"><h3>Biography</h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">{{ $users->bio->bio }}</td>
					</tr>
				</tbody>
			</table>
			<br>

			<!-- Favorite Quote -->
			<table class="table">
				<thead>
					<tr>
						<th class="text-center"><h3>Favorite Quote</h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">{{ $users->bio->quote }}</td>
					</tr>
				</tbody>
			</table>
			<br>

			<!-- Special Skills -->
			<table class="table">
				<thead>
					<tr>
						<th class="text-center"><h3>Special Skills</h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">{{ $users->bio->skills }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@include('components.coursemodal')
@endsection
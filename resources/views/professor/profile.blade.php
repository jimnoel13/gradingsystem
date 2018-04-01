@extends('layouts.user')

@section('profile')
<div class="row">
	<div class="col-md-3 margin-left">
		<div class="well">
			<div class="text-center">
				<img id="userpic" src="/storage/cover_images/{{ auth()->user()->profile_picture }}" id="img">
				<h3>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h3>
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
							<td>{{ auth()->user()->email }}</td>
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
							<td>{{ auth()->user()->contact_number }}</td>
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
							<td>{{ auth()->user()->location }}</td>
						</tr>
					</tbody>
				</table>

				<!-- Date Created -->
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Created Date</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ date('M j, Y', strtotime(auth()->user()->created_at)) }}</td>
						</tr>
					</tbody>
				</table>
			<a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-primary btn-block"><span class="fa fa-edit"></span> Edit Profile</a>
			</div>
		</div>
	</div>

	<!-- Personal Biography -->
	<div class="col-md-8">
		<div class="well">
			<h3><span class="fa fa-user-circle"></span> Personal Biography</h3>
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
						<td class="text-center">{{ $bio->who }}</td>
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
						<td>{{ $bio->elementary }}</td>
						<td>{{ $bio->highschool }}</td>
						<td>{{ $bio->college }}</td>
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
						<td class="text-center">{{ $bio->bio }}</td>
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
						<td class="text-center">{{ $bio->quote }}</td>
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
						<td class="text-center">{{ $bio->skills }}</td>
					</tr>
				</tbody>
			</table>
			<a href="{{ route('bio.edit', $bio->id) }}" class="btn btn-primary btn-block"><span class="fa fa-edit"></span> Edit Biography</a>
		</div>
	</div>
</div>
@endsection
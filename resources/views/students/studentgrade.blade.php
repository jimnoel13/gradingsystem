<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="icon" class="icon" href="{!! asset('images/st-therese-icon.ico') !!}"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/query/1.12.0/jquery.min.js"></script>
        <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
        <title>{{ config('app.name','SaintTherese') }}</title>
    </head>
    <body>
    <div class="container">

	<div class="text-center">
		<a href="{{ route('grades.show', $students->id) }}" id="myPrntbtn" class="btn btn-default pull-left"> Go Back</a> 
		<h2 class="right" id="schoolname"><img id="img" src="{{ asset("images/st-therese-logo.jpg") }}"> St. Therese of the Child Jesus Institute of Arts and Sciences <a id="myPrntbtn" onclick="window.print();" class="btn btn-primary pull-right"> Print</a></h2>
	</div>
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h5 id="h5"><strong>Name:</strong> {{ $students->last_name }}, {{ $students->first_name }}</h5>
			<h5 id="h5"><strong>Student ID:</strong> {{ $students->student_id }}</h5>
			<h5 id="h5"><strong>Course:</strong> {{ $students->course }}</h5>
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
			<h5 id="h5"><strong>Email:</strong> {{ $students->email }}</h5>
			<h5 id="h5"><strong>Location:</strong> {{ $students->location }}</h5>
		</div>
	</div>
	<br>
	<div class="text-center">
		<h4><strong>Student Grades</strong></h4>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Course Code</th>
				<th>Subject Title</th>
				<th>Sem</th>
				<th>Prelim</th>
				<th>Midterm</th>
				<th>Final</th>
				<th>Average</th>
				<th>Rating</th>
				<th>Remarks</th>
			</tr>
		</thead>
		<tbody>
			@foreach($students->stusub as $subs)
			<tr>
				<td><p>{{ $subs->subject_code }}</p></td>
				<td><p>{{ $subs->subject_title }}</p></td>
				<td><p>{{ $subs->semester }}</p></td>
				<td><p>{{ $subs->prelim }}</p></td>
				<td><p>{{ $subs->midterm }}</p></td>
				<td><p>{{ $subs->final }}</p></td>
				<td><p>{{ $subs->average }}</p></td>
				<td><p>{{ $subs->rating }}</p></td>
				<td><p>{{ $subs->remarks }}</p></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<h5><strong>RATING</strong></h5>
				<div style="margin-left: 8%;">
					<h5>1.00 = 99-100</h5>
					<h5>1.25 = 96-98</h5>
					<h5>1.50 = 93-95</h5>
					<h5>1.75 = 90-92</h5>
					<h5>2.00 = 87-89</h5>
					<h5>2.25 = 84-86</h5>
					<h5>2.50 = 81-83</h5>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top: 2%;">
				<div style="margin-left: 8%;">
					<h5>2.75 = 78-80</h5>
					<h5>3.00 = 75-77</h5>
					<h5>5.00 = FAILED</h5>
					<h5>INC = INCOMPLETE</h5>
					<h5>DRP = DROPPED</h5>
					<h5>UW = Unauthorized Withdrawal</h5>
					<h5>NG = NO GRADE</h5>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<h5><strong>SUMMARY</strong></h5>
				<h5>TOTAL STUDENTS ENROLLED</h5>
				<div style="margin-left: 12%;">
					<h5>PASSED</h5>
					<h5>FAILED</h5>
					<h5>INCOMPLETE</h5>
					<h5>DROPPED</h5>
					<h5>Unauthorized Withdrawal</h5>
				</div>
			</div>
		</div>
		<br><br><br><br><br><br>
		<div class="pull-left">
			<label><strong>Authority Signature:</strong> ________________________</label>
		</div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

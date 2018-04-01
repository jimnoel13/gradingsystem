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
    	<div class="container">
    	<div class="text-center">
    		<a href="{{ route('facultysubject.show', $facs->id) }}" id="myPrntbtn" class="btn btn-default pull-left"> Go Back</a> 
			<h2 class="right"><img id="img" src="{{ asset("images/st-therese-logo.jpg") }}"> St. Therese of the Child Jesus Institute of Arts and Sciences <a id="myPrntbtn" onclick="window.print();" class="btn btn-primary pull-right"> Print</a></h2>
		</div>
		
		<br><br>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h5><strong>INSTRUCTOR:</strong> {{ $facs->user->first_name }} {{ $facs->user->last_name }}</h5>
				<h5><strong>COURSE CODE:</strong> {{ $facs->subject_code }}</h5>
				<h5><strong>SUBJECT DESCRIPTION:</strong> {{ $facs->subject_title }}</h5>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h5>@if(!empty($facs->day))
					<strong>Day/Time:</strong> {{ $facs->day }} | {{ $facs->timefrom }} - {{ $facs->timeto }}
					@elseif(!empty($facs->day1))
					<strong>Day/Time:</strong> {{ $facs->day }} / {{ $facs->day1 }} | {{ $facs->timefrom }} - {{ $facs->timeto }}
					@elseif(!empty($facs->day2))
					<strong>Day/Time:</strong> {{ $facs->day }} / {{ $facs->day1 }} / {{ $facs->day2 }} | {{ $facs->timefrom }} - {{ $facs->timeto }}
					@endif</h5>
				<h5><strong>UNIT/S:</strong> {{ $facs->units }}</h5>
			</div>
		</div>
		
		<div class="text-center">
			<h3><strong>REPORT OF GRADES</Strong></h3>
			<small class="verdana">{{ $facs->semester }} Semester / SCHOOL YEAR {{ $facs->year }}-{{ $facs->to }}</small>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Course</th>
					<th>Prelim</th>
					<th>Midterm</th>
					<th>Final</th>
					<th>Average</th>
					<th>Rating</th>
					<th>Remarks</th>
				</tr>
			</thead>
			<tbody>
				@foreach($facs->stusub as $key => $stusub)
				<tr>
					<td><h6>{{ $stusub->student_code }}</h6></td>
					<td><h6>{{ $stusub->name }}</h6></td>
					<td><h6>{{ $stusub->course }}</h6></td>
					<td><h6>{{ $stusub->prelim }}</h6></td>
					<td><h6>{{ $stusub->midterm }}</h6></td>
					<td><h6>{{ $stusub->final }}</h6></td>
					<td><h6>{{ $stusub->average }}</h6></td>
					<td><h6>{{ $stusub->rating }}</h6></td>
					<td><h6>{{ $stusub->remarks }}</h6></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br><br><br>
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

		<br>
		<h5><strong>Certified Correct</strong></h5>
		<br>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="text-center">
					<p>________________________</p>
					<h5>FACULTY</h5>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<p><u><strong>Ms. Antonina G. Dinoy</strong></u></p>
				<h5>Dean</h5>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<h5><u><strong>MA. CARMEN F. ELCIARIO</strong></u></h5>
				<h5>Registrar</h5>
			</div>
		</div>

		<br><br>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-family: verdana;">
				<h5>Date:______________________</h5>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-family: verdana;">
				<h5>Date:______________________</h5>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-family: verdana;">
				<h5>Date:______________________</h5>
			</div>
		</div>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
</div>
<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

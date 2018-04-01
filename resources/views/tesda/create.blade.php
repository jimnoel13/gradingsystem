@extends('layouts.main')

@section('content')
	<h2><span class="fa fa-plus"></span> Create Subject <a href="{{ route('tesda.index') }}" class="btn btn-default pull-right"> Go Back</a></h2>
	<hr>
	<br>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-body">
				{!! Form::open(['action' => 'TESDAController@store', 'method' => 'POST']) !!}

					<!-- School Department -->
					{{ Form::label('school_dept', 'School Department') }}
						<select name="school_dept" class="form-control">
							<option value="CHEd"> CHEd</option>
							<option value="DepEd"> DepEd</option>
							<option value="TESDA"> TESDA</option>
						</select>

					<!-- Subject Code -->
					{{ Form::label('subject_code', 'Course Code') }}
					<input type="text" name="subject_code" class="form-control" placeholder="eg. SUB 1">

					<!-- Subject Title -->
					{{ Form::label('subject_title', 'Subject Title', ['class' => 'input-margin-top']) }}
					{{ Form::textarea('subject_title', '', ['class' => 'form-control', 'placeholder' => 'eg. Subject 1']) }}

					<!-- Units -->
					{{ Form::label('units', 'Units', ['class' => 'input-margin-top']) }}
					{{ Form::select('units', [
								   '6' => '6',
								   '3' => '3',
								   '2' => '2',
							       '1' => '1',
							       '0' => '0',
							       '-3' => '-3',], '', ['class' => 'form-control']) }}
					{{ Form::submit('Create', ['class' => 'btn btn-primary btn-block input-margin-top']) }}

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
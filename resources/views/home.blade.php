@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Logged In As Faculty!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h1 class="text-center">Welcome {{ auth()->user()->first_name }}...</h1>
                   
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-book"></span> Assigned Subjects : {{ count($assign) }}</div>

                <div class="panel-body">
                    @if(count($assign) == 0)
                        <h3 class="text-center">No Subjects Assigned Yet...</h3>
                    @else
                    @foreach($assign as $ass)
                    <div class="well">
                        <h3>Subject Title: {{ $ass->subject_title }}</h3>
                        <h5>Subject Code: {{ $ass->subject_code }}</h5>
                        <h5>Assigned On: {{ date('M j, Y', strtotime($ass->created_at)) }} <a href="{{ route('usersub.show', $ass->id) }}" class="btn btn-default pull-right">See More...</a></h5>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
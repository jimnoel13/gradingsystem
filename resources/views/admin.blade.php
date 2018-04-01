@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Logged In As Admin!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <h1 class="text-center">Welcome Admin...</h1>
        
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-users"></span> Registered Faculty : {{count($users)}}</div>
                    <div class="panel-body">
                        @foreach($users as $user)
                        <div class="well">
                            <h3>{{ $user->last_name }}, {{ $user->first_name }} {{ $user->mi }}</h3>
                            <h5><strong>Email:</strong> {{ $user->email }}</h5>
                            <h5><strong>Contact Number:</strong> @if(empty($user->alt_con))
                                                                    {{ $user->contact_number }} 
                                                                @else
                                                                    {{ $user->contact_number }} / {{ $user->alt_con }}
                                                                @endif
                                                                <a href="{{ route('prof.show', $user->id) }}" class="btn btn-primary pull-right">View Profile</a><a href="{{ route('faculty.show', $user->id) }}" class="btn btn-default pull-right"> Manage Subjects</a></h5>
                        </div>
                        @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.coursemodal')
@endsection
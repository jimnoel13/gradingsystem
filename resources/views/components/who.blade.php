@if(Auth::guard('web')->check())
	<p class="text-success">You are Logged In as Professor</p>
@else
	<p class="text-danger">You are Logged Out as Professor</p>
@endif

@if(Auth::guard('admin')->check())
	<p class="text-success">You are Logged In as Admin</p>
@else
	<p class="text-danger">You are Logged Out as Admin</p>
@endif
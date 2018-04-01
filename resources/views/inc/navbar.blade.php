<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" 
      @if(Auth::guard('admin')->check())
      href="{{ route('admin.dashboard') }}"
      @elseif(Auth::guard('web')->check())
      href="/home"
      @else
      href="/"
      @endif><span class="st">ST</span><span class="cjias">CJIAS</span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <!-- Admin Navbar -->
        @if(Auth::guard('admin')->check())
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-book"></span> Department<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/subjects"><img src="{{ asset('images/ched-logo.png') }}"> CHEd</a></li>
            <li><a href="/deped"><img src="{{ asset('images/deped-logo.png') }}"> DepEd</a></li>
            <li><a href="/tesda"><img src="{{ asset('images/tesda-logo.png') }}"> TESDA</a></li>
          </ul>
        </li>
        <li><a href="#" data-toggle="modal" data-target="#co"><span class="fa fa-info-circle"></span> Course</a></li>

        <!-- Professor Navbar -->
        @elseif(Auth::guard('web')->check())
        <li><a href="{{ route('profile.index') }}"><span class="fa fa-user-circle"></span> Profile</a></li>
        <li><a href="{{ route('usersub.index') }}"><span class="fa fa-book"></span> Subjects</a></li>

        <!-- Guest Navbar -->
        @else
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/"><span class="fa fa-home"></span> Home</a></li>
        @endif
      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
             @if(Auth::guard()->check())
             <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-user-circle"></span> Hello, {{ Auth::user()->first_name }}<span class="caret"></span></a>
             @else
             <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-sign-in"></span> Login<span class="caret"></span></a>
             @endif
      
            <!-- Admin Right-Navbar -->
            @if(Auth::guard('admin')->check())
            <ul class="dropdown-menu">
                <li><a href="{{ route('faculty.index') }}"><span class="fa fa-users"></span> Faculty</a></li>
                <li><a href="{{ route('students.index') }}"><span class="fa fa-users"></span> Student</a></li>
                <li><a href="/admin/logout"><span class="fa fa-sign-out"></span> Logout</a></li>
            </ul>

            <!-- Professor Right-Navbar -->
            @elseif(Auth::guard('web')->check())
            <ul class="dropdown-menu">
              <li>
                <div class="text-center">
                  <img src="/storage/cover_images/{{ auth()->user()->profile_picture }}" id="navpic">
                  <h4>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h4>
                </div>
              </li>
              <li class="divider"></li>
              <li><a href="/users/logout"> 
                <div class="text-center">
                  <span class="fa fa-sign-out"></span>Logout
                </div></a></li>
            </ul>

            @else
            <!-- Guest Right-Navbar --> 
            <ul class="dropdown-menu">
              <li><a href="#" data-toggle="modal" data-target="#adminlogin"><span class="fa fa-user"></span> Login as Admin</a></li>
            <li><a href="#" data-toggle="modal" data-target="#facultylogin"><span class="fa fa-user"></span> Login as Faculty</a></li>
          </ul>
          @endif
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>

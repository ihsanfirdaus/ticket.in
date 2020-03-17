

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="{{url('/')}}">
	<div class="logo d-inline-block align-top">
		<i class="icon-airplane3 icon-3x" style="color:#fff;padding:3.5px"></i>
	</div>
  </a>
  @guest
  	<ul class="nav justify-content-end">
	<a href="{{url('/login')}}">
	<button class="btn btn-primary my-2 my-sm-0" type="button" id="btn-masuk">
		<i class="fa fa-user-check" style="color:#fff"></i>&nbsp; 
	  Login</button>
	</a>
	<a href="{{url('/register')}}">
	<button class="btn btn-secondary my-2 my-sm-0" type="button" id="btn-daftar">
		<i class="fa fa-user" style="color:#fff"></i>&nbsp; 
	  Register</button>
	</a>
	</ul>
  @else
  	<ul class="nav justify-content-end">
	@if (Laratrust::hasRole('admin'))
		<a href="{{url('/admin/dashboard')}}"><button class="btn btn-info" type="button" id="btn_dash">Dashboard</button></a>
	@endif
	<button class="btn btn-primary my-2 my-sm-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-correct">
		<i class="fa fa-user-check" style="color:#fff"></i>&nbsp; 
	{{ Auth::user()->name }}</button>
	
	<div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
	Logout</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
     </form>
    </div>
	  </ul>
  @endguest

  
  </div>
</nav>
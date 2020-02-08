<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ticket.in - Beli Ticket Perjalanan Dengan Mudah dan Cepat</title>
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('icons/icomoon/styles.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
	<style>
		.bd-placeholder-img {
		  font-size: 1.125rem;
		  text-anchor: middle;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		}
  
		@media (min-width: 768px) {
		  .bd-placeholder-img-lg {
			font-size: 3.5rem;
		  }
		}
	</style>
	@yield('css-plugin')
</head>
<body class="text-center">
	<div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
	  <header class="masthead mb-auto">
		<div class="inner">
		  <h3 class="masthead-brand">
			<i class="icon-airplane3 icon-2x" style="margin-top: -12px;"></i> Ticket.in
		  </h3>
		  <nav class="nav nav-masthead justify-content-center">
		  <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}"> <i class="icon-home"></i> Beranda</a>
		  <a class="nav-link {{ Request::is('info-jadwal') ? 'active' : '' }}" href="{{url('/info-jadwal')}}"><i class="icon-calendar2"></i> Info Jadwal</a>
		  <a class="nav-link {{ Request::is('pesan-tiket') ? 'active' : '' }}" href="{{url('/pesan-tiket')}}"><i class="icon-ticket"></i> Pesan Tiket</a>
		  </nav>
		</div>
	  </header>
	
	  <main role="main" class="inner cover">
		@yield('content')
	  </main>
	  
	  <footer class="mastfoot mt-auto">
		<div class="inner">
		  <p>Copyright : <b style="color: #fff">Ticket.in</b>.</p>
		</div>
	  </footer>
	</div>
	<script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	@yield('js-plugin')
</body>
</html>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Ticket.in - Beli Tiket Perjalananmu Disini</title>
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('css/loading-page.css')}}">
			<link rel="stylesheet" href="{{asset('Front-end/css/linearicons.css')}}">
			{{-- <link rel="stylesheet" href="{{asset('Front-end/css/owl.carousel.css')}}"> --}}
			<link rel="stylesheet" href="{{asset('Front-end/css/fontawesome/css/all.min.css')}}">
			<link rel="stylesheet" href="{{asset('icons/icomoon/styles.css')}}">
			<link rel="stylesheet" href="{{asset('Front-end/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('Front-end/css/bootstrap.min.css')}}">
			<link rel="stylesheet" href="{{asset('Front-end/select2/dist/css/select2.min.css')}}">
			<link rel="stylesheet" href="{{asset('Front-end/select2/dist/css/select2-bootstrap.min.css')}}">
			<link rel="stylesheet" href="{{asset('SB-Admin/vendor/daterangepicker/daterangepicker.min.css')}}">
			<link rel="stylesheet" href="{{asset('Front-end/css/main.css')}}">
			<style>
				  @font-face{
					font-family:"Roboto Consended";
					src:url(../font/RobotoCondensed-Regular.ttf);
					src:url(../font/RobotoCondensed-Regular.ttf) format("ttf");
					src:url(../font/RobotoCondensed-Regular.ttf) format("truetype");
					font-display: fallback;
					}
					body{
						font-family:"Roboto Consended";letter-spacing:.5px
					}
				.img-center{
					display: block;
					margin-left: auto;
					margin-right: auto;
				}
			</style>
			@yield('main-css')
		</head>
		<body>
			
			<!-- Start Header Area -->
			@include('layouts/front_partials/header')
			<!-- End Header Area -->

			<!-- start banner Area -->
			{{-- <section class="banner-area relative" id="home">
				<div class="container">
						<div class="row fullscreen align-items-center justify-content-start">
							<div class="banner-content col-md-12">
							</div>
						</div>
				</div>
			</section> --}}
			<!-- End banner Area -->

			<!-- Start booking Area -->
			@yield('content') 
			<!-- End booking Area -->

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="service">
				<div class="container">
					<div class="row">
						<div class="sigle-feature col-lg-3 col-md-6">
							<span class="lnr lnr-rocket"></span>
							<h4>Easy Flight Search</h4>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct.
							</p>
						</div>
						<div class="sigle-feature col-lg-3 col-md-6">
							<span class="lnr lnr-magic-wand"></span>
							<h4>Get Hotel Offers</h4>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct.
							</p>
						</div>
						<div class="sigle-feature col-lg-3 col-md-6">
							<span class="lnr lnr-gift"></span>
							<h4>Holiday Packages</h4>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct.
							</p>
						</div>
						<div class="sigle-feature col-lg-3 col-md-6">
							<span class="lnr lnr-phone"></span>
							<h4>Dedicated Support</h4>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct.
							</p>
						</div>

					</div>
				</div>
			</section>
			<!-- End feature Area -->

			<!-- start footer Area -->
			@include('layouts/front_partials/footer')
			<!-- End footer Area -->
			
			<script src="{{asset('Front-end/js/jquery.min.js')}}"></script>
			<script src="{{asset('Front-end/js/bootstrap.min.js')}}"></script>
			{{-- <script src="{{asset('Front-end/validator/bootstrap-validate.js')}}"></script> --}}
			<script src="{{asset('Front-end/js/popper.min.js')}}"></script>
			{{-- <script src="{{asset('Front-end/js/owl.carousel.min.js')}}"></script> --}}
			<script src="{{asset('Front-end/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('Front-end/js/jquery.sticky.js')}}"></script>
			<script src="{{asset('Front-end/js/parallax.min.js')}}"></script>
			<script src="{{asset('Front-end/js/jquery-ui.min.js')}}"></script>
			<script src="{{asset('Front-end/js/jquery.magnific-popup.min.js')}}"></script>
			<script src="{{asset('Front-end/select2/dist/js/select2.min.js')}}"></script>
			<script src="{{asset('Front-end/select2-bootstrap-theme-master/docs/js/anchor.min.js')}}"></script>
			<script src="{{asset('Front-end/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
			<script src="{{asset('SB-Admin/vendor/daterangepicker/daterangepicker.min.js')}}"></script>
			<script>  
				$.fn.select2.defaults.set( "theme", "bootstrap" );
			</script>
			@yield('main-js')
			<script src="{{asset('Front-end/js/main.js')}}"></script>
			@stack('play-js')
		</body>
	</html>

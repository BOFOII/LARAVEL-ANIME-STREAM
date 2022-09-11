<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('../css/bootstrap-reboot.min.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/bootstrap-grid.min.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/slider-radio.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/plyr.css') }}">
	<link rel="stylesheet" href="{{ asset('../css/main.css') }}">

	<!-- Favicons -->
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>@yield('title')</title>

</head>
<body>
	<!-- page 404 -->
	<div class="page-404 section--full-bg" data-bg="img/bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-404__wrap">
						<div class="page-404__content">
							<h1 class="page-404__title">@yield('code')</h1>
							<p class="page-404__text">@yield('message')</p>
							<a href="{{ route('view.home') }}" class="page-404__btn">kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page 404 -->

	<!-- JS -->
	<script src="{{ asset('../js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('../js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('../js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('../js/slider-radio.js') }}"></script>
	<script src="{{ asset('../js/select2.min.js') }}"></script>
	<script src="{{ asset('../js/smooth-scrollbar.js') }}"></script>
	<script src="{{ asset('../js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('../js/plyr.min.js') }}"></script>
	<script src="{{ asset('../js/main.js') }}"></script>
</body>
</html>

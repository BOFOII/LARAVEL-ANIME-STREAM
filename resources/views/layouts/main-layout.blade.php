<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/slider-radio.css') }}">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">

	<meta name="description" content="{{ __('pages.web_desc') }}">
	<meta name="keywords" content="">
	<meta name="author" content="{{ __('pages.web_author') }}">
	<title>REONIME</title>

</head>

<body>
    @yield('header')

    @yield('content')

	<!-- footer -->
	@yield('footer')
	<!-- end footer -->

	<!-- JS -->
	<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/slider-radio.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('js/plyr.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

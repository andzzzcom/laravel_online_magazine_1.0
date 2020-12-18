@section("header")
<!DOCTYPE html>
<html>
@show

	<head>
		<title>@yield("title_web", $general_settings["title_web"])</title>
	  
		@section("header_settings")		
		<meta charset="utf-8">
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<meta name="description" content="{{ $general_settings['meta_description'] }}">
		<meta name="title" content="{{ $general_settings['meta_title'] }}">
		<meta name="keywords" content="{{ $general_settings['meta_keywords'] }}">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>

		<!-- Css -->
		<link rel="stylesheet" href="{{ asset('assets/theme1/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/theme1/css/font-icons.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/theme1/css/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/theme1/css/colors/red.css') }}" />
		
		<!-- Favicons -->
		<link rel="shortcut icon" href="{{ asset('assets/theme1/images/settings/'.$general_settings['favicon']) }}" />
		<link rel="apple-touch-icon" href="{{ asset('assets/theme1/images/apple-touch-icon.png') }}" />
		<link rel="apple-touch-icon" href="{{ asset('assets/theme1/images/apple-touch-icon-72x72.png') }}" />
		<link rel="apple-touch-icon" href="{{ asset('assets/theme1/images/apple-touch-icon-114x114.png') }}" />

		<!-- Lazyload (must be placed in head in order to work) -->
		<script src="{{ asset('assets/theme1/js/lazysizes.min.js') }}"></script>
		@show
		
	</head>
	
	<body class="home style-politics">

		<!-- Preloader -->
		<div class="loader-mask">
			<div class="loader">
				<div></div>
			</div>
		</div>

		<!-- Bg Overlay -->
		<div class="content-overlay"></div>

		@include("Front.incl.header")
		@include("Front.incl.content")
		@include("Front.incl.footer")
	  
		<div id="back-to-top">
			<a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
		</div>

		</main> <!-- end main-wrapper -->

	
		@section("footer")
		<script src="{{ asset('assets/theme1/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/easing.min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/owl-carousel.min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/flickity.pkgd.min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/twitterFetcher_min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/jquery.newsTicker.min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/modernizr.min.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/scripts.js') }}"></script>
		<script src="{{ asset('assets/theme1/js/moment.js') }}"></script>
		@show

	</body>
</html>
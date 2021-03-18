    
    <title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" />
	<meta name="keywords" content="@yield('keywords')" />
	<meta name="description" content="@yield('description')" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('assets/css/login_overlay.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('assets/css/style6.css') }}" rel='stylesheet' type='text/css' />
	{{-- <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" type="text/css" /> --}}
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}" type="text/css" media="all" />

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui1.css') }}">
	<link href="{{ asset('assets/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}" type="text/css" media="screen" />

	<link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('assets/css/fontawesome-all.css')}}" rel="stylesheet" />
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet" />
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet" />
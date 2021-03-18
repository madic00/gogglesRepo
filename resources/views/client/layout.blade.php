<!DOCTYPE html>
<html lang="en">

<head>

    @include('client.fixed.head')
	
</head>

<body>

	@include('client.fixed.header')

	@yield('banner')

	@yield('content')

	@include('client.fixed.footer')

	@include('client.fixed.commonScripts')

	@yield('pageScripts')
	
</body>

</html>
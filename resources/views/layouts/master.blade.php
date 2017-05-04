<!DOCTYPE html>
<html>
	<head>
		<title> My Blog | @yield('title')</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			@include('layouts.partials.nav')
			@yield('content')
		</div>
	</body>
</html>
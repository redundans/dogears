<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
	<div class="container mx-auto flex flex-col gap-9 px-6">
		@include('includes.header')
		<div id="main">
			@yield('content')
		</div>
		@include('includes.footer')
	</div>
</body>
</html>

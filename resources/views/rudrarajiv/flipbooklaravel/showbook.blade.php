<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('extras/modernizr.2.5.3.min.js') }}"></script>
</head>

<body>

	<div class="flipbook-viewport">
		<div class="container">
			<div class="flipbook">
				@foreach($content as $page)
				<div style="background-image:url({{ asset($page) }})"></div>
				@endforeach
			</div>
		</div>
	</div>


	<script type="text/javascript">
		function loadApp() {

	// Create the flipbook

	$('.flipbook').turn({
			// Width
			width:922,
			// Height
			height:600,
			// Elevation
			elevation: 50,
			// Enable gradients
			gradients: true,
			// Auto center this flipbook
			autoCenter: true
	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['{{ asset('lib/turn.js') }}'],
	nope: ['{{ asset('lib/turn.html4.min.js') }}'],
	both: ['{{ asset('css/basic.css') }}'],
	complete: loadApp
});

	</script>

</body>

</html>
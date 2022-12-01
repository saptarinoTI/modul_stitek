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
		<div style="font-weight: 500;
		border-radius: 4px;
		text-decoration: none;
		justify-content: flex-start;
		align-items: flex-start;
		display: flex;
		width: 8%;
		height: 100vh;
		z-index: 9999;
		position: absolute;">
			<a href="{{ route('flipbook.index') }}"
				style="color: white; border-radius: 4px; text-decoration: none; background-color: rgb(49, 49, 223); margin: 8px 0 0 5px; font-size: 13px; display: flex; align-items: center; padding: 5px 16px;">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
					style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:; padding-right: 5px">
					<path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
				</svg>
				Back
			</a>
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
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>@yield('titulo', 'Bienvenido')</title>
		<link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    	<link rel="apple-touch-icon" href="{{ asset('img/logo.png') }}" />
   	 	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    	<link rel="stylesheet" href="{{ asset('css/icon.css') }}">
    	<script src=" {{ asset('js/jquery.js') }}"></script>
		@yield('css')
	</head>
	<body>
		<div class="container">
			@include('layouts.elements.navbar')	
			<div class="row row-fluid">
				<div class="col-md-10 col-sm-offset-1">
					@include('flash::message')
					@if(count($errors) > 0)
						<div class="alert alert-danger" role="alert">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>	
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					@yield('content')	
				</div>
			</div>
		</div>
		@include('layouts.elements.footer')	
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		@yield('scripts')
	</body>
</html>
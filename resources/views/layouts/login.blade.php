<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>@yield('titulo', 'Bienvenido')</title>
		<link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    	<link rel="apple-touch-icon" href="{{ asset('img/logo.png') }}" />
   	 	<link rel="stylesheet" href="{{ asset('/css/theme/assets/css/bootstrap.min.css') }}">
   	 	<link rel="stylesheet" href="{{ asset('/css/theme/assets/css/demo.css') }}">
    	<link rel="stylesheet" href="{{ asset('/css/theme/assets/css/material-dashboard.css') }}">
		<link rel="stylesheet" href="{{ asset('css/assets/css/icons.css') }}">
    	<link rel="stylesheet" href="{{ asset('css/assets/css/style.css') }}">
		<!--Data table -->
    	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dataTables/css/jquery.dataTables.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dataTables/css/jquery.dataTables.min.css') }}">
    	<!-- <script src=" {{ asset('js/jquery.js') }}"></script> -->
		<script src="{{ asset('/css/theme/assets/js/jquery-3.1.0.min.js') }}"></script>

		@yield('css')
	</head>
	<body>
		<div class="wrapper">
			<div class="container-fluid">
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
				@yield('content')
				</div>
			</div>
		</div>
		<br>
		<br>
		@include('layouts.elements.footer')	
		<script src="{{ asset('/css/theme/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/css/theme/assets/js/bootstrap-notify.js') }}"></script>
		<script src="{{ asset('/css/theme/assets/js/chartist.min.js') }}"></script>
		<script src="{{ asset('/css/theme/assets/js/demo.js') }}"></script>
		<script src="{{ asset('/css/theme/assets/js/material.min.js') }}"></script>
		<script src="{{ asset('/css/theme/assets/js/material-dashboard.js') }}"></script>
		<!--Mis funciones -->
		<script src="{{ asset('js/main.js') }}"></script>
		<!--Data tables -->
		<script type="text/javascript" src="{{ asset('plugins/dataTables/js/jquery.dataTables.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/dataTables/js/dataTables.bootstrap.js') }}"></script>
		@yield('scripts')
	</body>
</html>
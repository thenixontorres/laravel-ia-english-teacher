@extends('layouts.app')
@section('content')
 <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-profile">
					<div class="card-avatar">
							<img class="img" src="{{ asset(Auth::user()->persona->foto)}}" />
					</div>
					<div class="content">
						<h6 class="category text-gray">{{ Auth::user()->tipo }}</h6>
						<h4 class="card-title">{{ Auth::user()->persona->nombre.' '.Auth::user()->persona->apellido }}</h4>
						<a href="#" class="btn btn-default">Actualizar Perfil</a>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" data-background-color="orange">
						<h4 class="title">Mis Materias</h4>
					</div>
					<div class="card-content">
						Contenido de la seccion
					</div>
					<br>
					<div class="card-header" data-background-color="orange">
						<h4 class="title">Mis Evaluaciones</h4>
					</div>
					<div class="card-content">
						Contenido de la seccion
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection
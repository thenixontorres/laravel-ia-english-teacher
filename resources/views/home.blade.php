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
						<a href="{!! route('profesor.personas.edit', Auth::User()->persona->id) !!}" class="btn btn-default">Actualizar Perfil</a>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					@if(Auth::user()->tipo == "Profesor")
						<div class="card-header" data-background-color="orange">
							<h4 class="title" id="materias">Mis Materias</h4>
						</div>
						<div class="card-content">
							<table class="table table-responsive" id="table">
								<thead>
									<th>Materia</th>
									<th>Seccion</th>
									<th>Ver Estudiantes</th>
								</thead>
								<tbody>
								@foreach(Auth::user()->persona->materias as $materia)
									<tr>
										<td>{!! $materia->materia !!}</td>
										<td>{!! $materia->seccion->seccion !!}</td>
										<td> 
											<a href="{!! route('profesor.estudiantes.mis_estudiantes_show', [$materia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<br>
					<div class="card-header" data-background-color="orange">
						<h4 class="title" id="evaluacions">Mis Evaluaciones</h4>
					</div>
					<div class="card-content">
						<table class="table table-responsive" id="table">
							<thead>
								<th>Evaluacion</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Ver Detalles</th>
								<th>Editar</th>
							</thead>
							<tbody>
							@foreach(Auth::user()->persona->materias as $materia)
								<tr>
									<td>{!! $materia->materia !!}</td>
									<td>{!! $materia->seccion->seccion !!}</td>
									<td> 
										<a href="#" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
									</td>
									<td>
											<a href="#" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-plus"></i/></a>	
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					<br>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection
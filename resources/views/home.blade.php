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
						@if(Auth::User()->tipo == 'Profesor')
						<a href="{!! route('profesor.personas.edit', Auth::User()->persona->id) !!}" class="btn btn-default">Actualizar Perfil</a>
						@elseif(Auth::User()->tipo == 'Estudiante')
						<a href="{!! route('estudiante.personas.edit', Auth::User()->persona->id) !!}" class="btn btn-default">Actualizar Perfil</a>
						@else
						<a href="{!! route('admin.personas.edit', Auth::User()->persona->id) !!}" class="btn btn-default">
						@endif
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
									<th>Acciones</th>
								</thead>
								<tbody>
								@foreach(Auth::user()->persona->materias as $materia)
									<tr>
										<td>{!! $materia->materia !!}</td>
										<td>{!! $materia->seccion->seccion !!}</td>
										{!! Form::open(['route' => ['profesor.materias.destroy', $materia->id], 'method' => 'delete']) !!}
										<td> 
											<a href="{!! route('profesor.estudiantes.mis_estudiantes_show', [$materia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
											<a href="{!! route('profesor.materias.edit', [$materia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
											{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro que desea borrar esta materia?')"]) !!}
										</td>
										{!! Form::close() !!}
									</tr>
								@endforeach
								</tbody>
							</table>
							<a class="btn btn-default" href="{!! route('profesor.materias.create') !!}"><i class="glyphicon glyphicon-plus"></i></a>
						</div>
						<br>
						<div class="card-header" data-background-color="orange">
							<h4 class="title" id="evaluacions">Mis Evaluaciones</h4>
						</div>
						<div class="card-content">
							<table class="table table-responsive" id="table">
								<thead>
									<th>Titulo</th>
									<th>Tipo</th>
									<th>Estado</th>
									<th>Materia</th>
									<th>Acciones</th>
								</thead>
								<tbody>
								@foreach(Auth::user()->persona->materias as $materia)
									@foreach($materia->evaluacions as $evaluacion)
										<tr>
										<td>{{ $evaluacion->titulo }}</td>
										<td>{{ $evaluacion->tipo }}</td>
										<td>{{ $evaluacion->estado }}</td>
										<td>{{ $evaluacion->materia->materia }}</td>
										<td>
											 <a href="{!! route('profesor.casos.show', [$evaluacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
	                   						 <a href="{!! route('profesor.evaluacions.edit', [$evaluacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
	                   
										</td>
										</tr>
									@endforeach
								@endforeach
								</tbody>
							</table>
							<a class="btn btn-default" href="{!! route('profesor.evaluacions.create') !!}"><i class="glyphicon glyphicon-plus"></i></a>
						</div>
						<br>
					@elseif(Auth::user()->tipo == "Estudiante")
						<div class="card-header" data-background-color="orange">
							<h4 class="title" id="materias">Mi Materia</h4>
						</div>
						<div class="card-content">
							<table class="table table-responsive" id="table">
								<thead>
									<th>Materia</th>
									<th>Seccion</th>
								</thead>
								<tbody>
									<tr>
										<td>{!! Auth::user()->persona->estudiante->materia->materia !!}</td>
										<td>{!! Auth::user()->persona->estudiante->materia->seccion->seccion !!}</td>
									</tr>
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
									<th>Titulo</th>
									<th>Materia</th>
									<th>Acciones</th>
								</thead>
								<tbody>
								@foreach(Auth::user()->persona->estudiante->materia->evaluacions as $evaluacion)
									@if($evaluacion->estado == 'Activo' && $evaluacion->tipo == 'Prueba')
											<tr>
											<td>{{ $evaluacion->titulo }}</td>
											<td>{{ $evaluacion->materia->materia }}</td>
											<td>
												 <a href="{!! route('estudiante.casos.play', [$evaluacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-play"></i></a>
		               
											</td>
											</tr>
									@endif		
								@endforeach
								</tbody>
							</table>
						</div>
						<br>
						<div class="card-header" data-background-color="orange">
							<h4 class="title" id="practicas">Mis Practicas</h4>
						</div>
						<div class="card-content">
							<table class="table table-responsive" id="table">
								<thead>
									<th>Titulo</th>
									<th>Materia</th>
									<th>Acciones</th>
								</thead>
								<tbody>
								@foreach(Auth::user()->persona->estudiante->materia->evaluacions as $evaluacion)
									@if($evaluacion->estado == 'Activo' && $evaluacion->tipo == 'Practica')
											<tr>
											<td>{{ $evaluacion->titulo }}</td>
											<td>{{ $evaluacion->materia->materia }}</td>
											<td>
												 <a target="_blank" href="{!! route('estudiante.casos.test', [$evaluacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-play"></i></a>
		               
											</td>
											</tr>
									@endif		
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
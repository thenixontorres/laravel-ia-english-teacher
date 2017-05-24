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
								<th>Evaluacion</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Ver Detalles</th>
								<th>Editar</th>
							</thead>
							<tbody>
							
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
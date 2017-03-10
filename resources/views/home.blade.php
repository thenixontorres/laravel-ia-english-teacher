@extends('layouts.app')
@section('content')
	<div class="row" id="inicio">
	<!-- perfil -->
	<div class="col-md-3 panel panel-default">
		<div class="row">
			<div class="col-md-12 ">
				<center>
				<h4>Nombre y Apellido </h4>
				</center>
			</div> 
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<center>
				<img class="img img-responsive " src="{{ asset('img/avatar.jpg') }}" alt="">
				</center> 
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4 ">
				Meteria: 
			</div>
			<div class="col-md-8 ">
				Ingles 
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 ">
				Seccion: 
			</div>
			<div class="col-md-8 ">
				II 
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12 indicador indicador-azul">
				 <h4 class="indicador"> <button class="btn btn-default">Actualizar Perfil </button></h4> 
			</div>
		</div>
	</div>
	<!-- parte derecha -->
	<div class="col-md-8 col-md-offset-1">
		<!--panel de ev terminadas --> 
		<div class="row  panel panel-default">
			<div class="col-md-12">	
				<div class="row">
					<div class="col-md-12 ">
						<center>
						<h4>Evaluaciones Terminadas </h4>
						</center>
					</div> 
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						TITULO DE LA EVALUACION. 
					</div>
					<div class="col-md-3">
						100/100
					</div>
					<div class="col-md-1">
						<button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button> 
					</div> 
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						TITULO DE LA EVALUACION. 
					</div>
					<div class="col-md-3">
						100/100
					</div>
					<div class="col-md-1">
						<button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button> 
					</div> 
				</div>
				<br>
			</div>	
		</div>
		@include('sections.evaluaciones')
		@include('sections.practicas')
	</div>
</div>	
@endsection
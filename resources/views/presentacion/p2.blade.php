@extends('layouts.login')	
@section('title','Iniciar Sesion')
@section('content')	
	
<div class="row">
    <div class="col-lg-6 col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title text-center" >Objetivos de la situacion de la problematica</h4>
            </div>
            <div class="card-content table-responsive">    
				<div class="form-group">
					<center><h4>Objetivo del Sistema Actual</h4></center>
				</div>
				<div class="form-group">
					<p class="text-justify">Este sistema tiene como 	finalidad que el grupo de estudiantes aprenda 	  los fundamentos de  inglés, 
						tomando como principal foco el inglés técnico en base a la forma de enseñar del profesor quien en
						este caso es la única fuente de sabiduría.
					</p>
				</div>
				<div class="form-group">
					<center><h4>Objetivos de la Propuesta</h4></center>
				</div>
				<div class="form-group">
					<p class="text-justify">
						El objetivo general de la siguiente propuesta es desarrollar un sistema basado en Inteligencia Artificial  para el 
						apoyo de  la evaluación de actividades académicas en la asignatura Inglés II mediante el uso de Chatbots en el Área 
						de Ingeniería en Sistemas de la Universidad Nacional Experimental Rómulo Gallegos. Los objetivos específicos son: 
					</p>
					<p><strong>
						A) Diagnosticar la situación actual de la asignatura de inglés II en el Área de Ingeniería en Sistemas de la 
						Universidad Nacional Experimental Rómulo Gallegos.
					</strong></p>
					<p><strong>
						B) Determinar los requerimientos del sistema propuesto en función de las necesidades detectadas durante el 
						diagnóstico realizado en asignatura de inglés II en el Área de Ingeniería en Sistemas de la Universidad Nacional 
						Experimental Rómulo Gallegos.
					</strong></p>
					<p><strong>
						C) Diseñar un bot conversacional  para  la evaluación de actividades académicas en la asignatura inglés II en el
 						Área de Ingeniería en Sistemas de la Universidad Nacional Experimental Rómulo Gallegos.
					</strong></p>
					<p><strong>
						D) Implementar un bot conversacional  para  la evaluación de actividades académicas en la asignatura inglés
 						II en el Área de Ingeniería en Sistemas de la Universidad Nacional Experimental Rómulo Gallegos.
					</strong></p>
				</div>
				<center><a href="{{ route('presentacion.p1') }}" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i></a><a href="{{ route('presentacion.p3') }}" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></a></center>
			</div>
		</div>
	</div>		
</div>
@endsection


@extends('layouts.login')	
@section('title','Iniciar Sesion')
@section('content')	
	
<div class="row">
    <div class="col-lg-6 col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title text-center" >Demostracion de la metodologia aplicada hasta la fase actual.</h4>
            </div>
            <div class="card-content table-responsive">    
				<div class="form-group">
					<center><h4>Metodologia I.D.E.A. L</h4></center>
				</div>
				<div class="form-group">
					<p class="text-justify">La Metodología IDEAL, desarrollada por Carrillo V. en sus tesis para optar por el título de Doctor 
					en Informática, intenta una primera aproximación a la sistematización del desarrollo de Sistemas Expertos,
					 estructurándolo en una serie de fases, etapas y actividades que intentan facilitar la labor del Ingeniero
					 en la construcción de un Sistema Experto.
					</p>
				</div>
				<div class="form-group">
					<center><h4>Fases:</h4></center>
				</div>
				<div class="form-group">
					<p class="text-justify">
						<strong>Fase I: </strong> Determinación de necesidades y valoración del proyecto. 
						En esta fase hay que dar respuesta a tres condiciones básicas para el desarrollo posterior del Sistema Experto.
					</p>
					<p class="text-justify">
						<strong>Fase II: </strong> Construcción conceptual del  Prototipo  y diseño de  la  Ingeniería  del Conocimiento.  
					</p>
					<p class="text-justify">
						<strong>Fase III (Fase Actual): </strong> Construcción  de la versión  en  producción.
					</p>
					<p class="text-justify">
						<strong>Fase IV: </strong> Comprobación  del  Sistema  e  Integración  del  mismo  en Producción.
					</p>
				</div>
				<center><a href="{{ route('presentacion.p5') }}" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i></a>
				<a href="{{ route('home') }}" class="btn btn-primary"><i class="glyphicon glyphicon-play"></i></a>
				</center>

			</div>
		</div>
	</div>		
</div>
@endsection


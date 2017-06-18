@extends('layouts.login')	
@section('title','Iniciar Sesion')
@section('content')	
	
<div class="row">
    <div class="col-lg-6 col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title text-center" >Descripcion del contexto de la problematica planteada</h4>
            </div>
            <div class="card-content table-responsive">    
				<div class="form-group">
					<p class="text-justify">La Universidad Nacional Experimental de los Llanos Centrales, "Rómulo Gallegos",
					es una institución educativa con una misión comprometida a buscar la verdad por
					medio de la investigación, creación, y divulgación del conocimiento.</p>
				</div>
				<div class="form-group">
					<p class="text-justify">
						Mediante la técnica de la observación directa en el aula de clases se obtuvo la información
						suficiente para estructurar un análisis crítico de la situación actual en la asignatura de 
						inglés II. En cuanto a las debilidades que se presentan, destaca la omisión general de medios
						 tecnológicos dentro del aula y la falta de implementación de algún método fiable para hacer 
						evaluaciones a distancia para compensar las pocas horas académicas disponibles. Además tampoco
						es visible algún método para practicar y evaluar los conocimientos adquiridos en un entorno real. 
					</p>
				</div>
				<center><a href="{{ route('presentacion.p2') }}" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></a></center>
			</div>
		</div>
	</div>		
</div>
@endsection


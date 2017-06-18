@extends('layouts.login')	
@section('title','Iniciar Sesion')
@section('content')	
	
<div class="row">
    <div class="col-lg-6 col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title text-center" >Demostracion de la recoleccion, interpretacion, analisis  y metodos de adquisicion del conocimiento.</h4>
            </div>
            <div class="card-content table-responsive">    
				<div class="form-group">
					<img class="img img-responsive" src="{{ asset('img/presentacion/ingenieria.JPG') }}">
				</div>
				<center><a href="{{ route('presentacion.p4') }}" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i></a><a href="{{ route('presentacion.p6') }}" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></a></center>
			</div>
		</div>
	</div>		
</div>
@endsection


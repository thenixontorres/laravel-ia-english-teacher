@extends('layouts.login')	
@section('title','Iniciar Sesion')
@section('content')	
	
<div class="row">
    <div class="col-lg-6 col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title text-center" >Demostracion de diseño de datos</h4>
            </div>
            <div class="card-content table-responsive">    
				<div class="form-group">
					<img class="img img-responsive" src="{{ asset('img/presentacion/AFND.jpg') }}">
				</div>
				<center><a href="{{ route('presentacion.p3') }}" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i></a><a href="{{ route('presentacion.p5') }}" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></a></center>
			</div>
		</div>
	</div>		
</div>
@endsection


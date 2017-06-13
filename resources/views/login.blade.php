@extends('layouts.login')	
@section('title','Iniciar Sesion')
@section('content')	
	
<div class="row">
    <div class="col-lg-6 col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title text-center" >Iniciar Sesion</h4>
            </div>
            <div class="card-content table-responsive">    
				{!! Form::open(['route' => 'auth.login', 'method' => 'POST', 'class' => 'form']) !!}
					<div class="form-group">
						{!! Form::label('email', 'E-Mail:') !!}
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su E-Mail', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Contraseña:') !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese su Contraseña', 'required']) !!}
					</div>
					<center><button type="submit" class="btn btn-primary">Entrar</button></center>
				{!! Form::close() !!}
			</div>
		</div>
	</div>		
</div>
@endsection


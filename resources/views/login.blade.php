@extends('layouts.app')	
@section('title','Iniciar Sesion')
@section('content')		
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default panel-body">   
				<div class="row">
					<div class="col-md-12">
						<h2 class="text-center">INICIAR SESION</h2>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
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
	</div>
@endsection


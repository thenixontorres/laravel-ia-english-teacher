@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">     {{ $persona->nombre.' '.$persona->apellido }} </h4> 
            </div>
            <div class="card-content table-responsive">                   
            {!! Form::model($persona, ['route' => ['profesor.personas.update', $persona->id], 'method' => 'patch', 'files' => true,  'onsubmit' => 'return contras();']) !!}

            <!-- De la tabla persona -->
            <!-- Nombre Field -->
            <div class="form-group col-md-12">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Apellido Field -->
            <div class="form-group col-md-12">
                {!! Form::label('apellido', 'Apellido:') !!}
                {!! Form::text('apellido', null, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Cedula Field -->
            <div class="form-group col-md-12">
                {!! Form::label('cedula', 'Cedula:') !!}
                {!! Form::text('cedula', null, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Foto Field -->
            <div class="form-group col-md-12">
                {!! Form::label('foto', 'foto:') !!}
                {!! Form::file('foto', ['class' => 'form-control']) !!}
            </div>

            <!-- De la tabla user -->
            <!-- Email Field -->
            <div class="form-group col-md-12">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', $persona->user->email, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Password Field -->
            <div class="form-group col-md-12">
                {!! Form::label('password', 'Clave:') !!}
                    <input id="ctr1" class="form-control" type="password" name="password">
            </div>

            <!-- Clave confirm Field -->
            <div class="form-group col-md-12">
                    {!! Form::label('password2', 'Confirmar Clave:') !!}
                    <input id="ctr2" class="form-control" type="password" name="password2" placeholder="Repita su Contraseña">
            </div>

            <!-- Submit Field -->
            <div class="form-group col-md-12">
                <center>
                {!! Form::submit('Actualizar', ['class' => 'btn btn-default']) !!}
                <a href="{!! route('home') !!}" class="btn btn-warning">Cancelar</a>
                </center>
            </div>
            {!! Form::close() !!}
          </div>    
        </div>
    </div>
</div>      
@endsection
@section('scripts')
    <script src="{{ asset('/js/funciones.js') }}"></script>
@endsection
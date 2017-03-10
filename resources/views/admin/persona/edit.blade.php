@extends('layouts.app')

@section('content')
    <div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> {{ $persona->nombre.' '.$persona->apellido }} </h4>
    </div>
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/right.png') }}" alt="">
    </div>      
</div>
<div class="row">
    <div class="col-md-2">
        @include('layouts.elements.panel')
    </div>
    <div class="col-md-10">
        <div class="row panel panel-default">

            {!! Form::model($persona, ['route' => ['admin.personas.update', $persona->id], 'method' => 'patch', 'files' => true,  'onsubmit' => 'return contras();']) !!}

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

            <!-- Estado Field -->
            <div class="form-group col-md-12">
                {!! Form::label('estado', 'Estado:') !!}
                <select name="estado" class="form-control">
                    @if($persona->user->estado == "Activo")
                        <option value="Activo" selected>Activo</option>
                        <option value="Inactivo">Inactivo</option>    
                    @else
                        <option value="Activo">Activo</option>
                        <option value="Inactivo" selected>Inactivo</option>
                    @endif
                </select>       
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
                {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
                <a href="{!! route('admin.personas.index') !!}" class="btn btn-warning">Cancelar</a>
                </center>
            </div>


            {!! Form::close() !!}
        </div>    
    </div>
</div>    
@endsection

@section('scripts')
    <script src="{{ asset('/js/funciones.js') }}"></script>
@endsection
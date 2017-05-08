@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title"> {{ $estudiante->persona->nombre.' '.$estudiante->persona->apellido }} </h4> 
            </div>
            <div class="card-content table-responsive">                   
                    
            {!! Form::model($estudiante, ['route' => ['admin.estudiantes.update', $estudiante->id], 'method' => 'patch', 'files' => true ,'onsubmit' => 'return contras();']) !!}

            <!-- De la tabla persona -->
            <!-- Nombre Field -->
            <div class="form-group col-md-12">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', $estudiante->persona->nombre, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Apellido Field -->
            <div class="form-group col-md-12">
                {!! Form::label('apellido', 'Apellido:') !!}
                {!! Form::text('apellido', $estudiante->persona->apellido, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Cedula Field -->
            <div class="form-group col-md-12">
                {!! Form::label('cedula', 'Cedula:') !!}
                {!! Form::text('cedula', $estudiante->persona->cedula, ['class' => 'form-control','required']) !!}
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
                {!! Form::text('email', $estudiante->persona->user->email, ['class' => 'form-control','required']) !!}
            </div>

            <!-- Estado Field -->
            <div class="form-group col-md-12">
                {!! Form::label('estado', 'Estado:') !!}
                <select name="estado" class="form-control">
                   @if($estudiante->persona->user->estado == "Activo")
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

            <!-- De la tabla estudiante -->
            <!-- materia Field -->
            <div class="form-group col-md-12">
                {!! Form::label('materia', 'Materia:') !!}
                <select name="materia_id" class="form-control">
                    @foreach ($materias as $materia)
                        @if ($estudiante->materia->id == $materia->id)
                            <option value="{{ $materia->id }}" selected>{{ $materia->materia.' Seccion: '.$materia->seccion->seccion }} 
                            </option>
                        @else
                            <option value="{{ $materia->id }}">{{ $materia->materia.' Seccion: '.$materia->seccion->seccion }} 
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Periodo Field -->
            <div class="form-group col-md-12">
                {!! Form::label('periodo', 'Periodo:') !!}
                <select name="periodo_id" class="form-control">
                    @foreach ($periodos as $periodo)
                        @if ($estudiante->periodo->id == $periodo->id)
                            <option value="{{ $periodo->id }}" selected>{{ $periodo->periodo }} 
                        </option>    
                        @else
                            <option value="{{ $periodo->id }}">{{ $periodo->periodo }} 
                        </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Submit Field -->
            <div class="form-group col-md-12">
                <center>
                {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
                <a href="{!! route('admin.estudiantes.index') !!}" class="btn btn-warning">Cancelar</a>
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
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title"> {{ $estudiante->persona->nombre.' '.$estudiante->persona->apellido }} </h4> 
            </div>
            <div class="card-content table-responsive">                   
                    
            {!! Form::model($estudiante, ['route' => ['profesor.estudiantes.update', $estudiante->id], 'method' => 'patch', 'files' => true]) !!}

            <!-- De la tabla persona -->
            <!-- Nombre Field -->
                {!! Form::hidden('nombre', $estudiante->persona->nombre, ['class' => ' ','required']) !!}

            <!-- Apellido Field -->
                {!! Form::hidden('apellido', $estudiante->persona->apellido, ['class' => ' ','required']) !!}

            <!-- Cedula Field -->
                {!! Form::hidden('cedula', $estudiante->persona->cedula, ['class' => ' ','required']) !!}
            
            <!-- De la tabla user -->
            <!-- Email Field -->
                {!! Form::hidden('email', $estudiante->persona->user->email, ['class' => ' ','required']) !!}

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

            <!-- materia Field -->
            <div class="form-group col-md-12">
                {!! Form::label('materia', 'Materia:') !!}
                <select name="periodo_id" class="form-control">
                    @foreach ($materias as $materia)
                        @if ($estudiante->materia->id == $materia->id)
                            <option value="{{ $materia->id }}" selected>{{ $materia->materia.' '.$materia->seccion->seccion }} 
                            </option>    
                        @else
                            <option value="{{ $materia->id }}">{{ $materia->materia.' '.$materia->seccion->seccion }} 
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
                <a href="{!! route('profesor.estudiantes.mis_estudiantes_show', $estudiante->materia->id) !!}" class="btn btn-warning">Volver</a>
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
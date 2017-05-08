@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">Registrar Caso</h4>
            </div>
            <div class="card-content table-responsive">                   
                {!! Form::open(['route' => 'admin.casos.store']) !!}

                <!-- Evaluacion Field -->
                <div class="form-group col-md-12">
                {!! Form::label('evaluacion', 'Evaluacion:') !!}
                    <select name="evaluacion_id" class="form-control">
                    @foreach ($evaluacions as $evaluacion)
                    <option value="{{ $evaluacion->id }}">{{ $evaluacion->titulo }} 
                    </option>
                    @endforeach
                    </select>
                </div>
                <!-- titulo Field -->
                <div class="form-group col-md-12">
                    {!! Form::label('titulo', 'Titulo:') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control','required']) !!}
                </div>
                <!-- enunciado Field -->
                <div class="form-group col-md-12">
                    {!! Form::label('enunciado', 'Enunciado:') !!}
                    {!! Form::textarea('enunciado', null, ['class' => 'form-control','required']) !!}
                </div>
                <!-- Submit Field -->
                <div class="form-group col-md-12">
                <center>
                {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
                <a href="{!! route('admin.casos.index') !!}" class="btn btn-warning">Cancelar</a>
                </center>
                </div>

                {!! Form::close() !!}
           </div>  
        </div>
    </div>   
</div>  
@endsection

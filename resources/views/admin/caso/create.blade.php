@extends('layouts.app')

@section('content')
<div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> REGISTRAR BOT </h4>
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
@endsection

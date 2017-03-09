@extends('layouts.app')

@section('content')
    <div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> {{ $reaccion->titulo }} </h4>
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

            {!! Form::model($reaccion, ['route' => ['admin.reaccions.update', $reaccion->id], 'method' => 'patch', 'files' => true]) !!}

            <!-- titulo Field -->
            <div class="form-group col-md-12">
                {!! Form::label('titulo', 'Titulo:') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control','required']) !!}
            </div>
            <!-- Reaccion Field -->
            <div class="form-group col-md-12">
                {!! Form::label('reaccion', 'Imagen:') !!}
                {!! Form::file('reaccion', ['class' => 'form-control']) !!}
            </div>
            <!-- Submit Field -->
            <div class="form-group col-md-12">
                <center>
                {!! Form::submit('Actualizar', ['class' => 'btn btn-default']) !!}
                <a href="{!! route('admin.reaccions.index') !!}" class="btn btn-warning">Cancelar</a>
                </center>
            </div>
            {!! Form::close() !!}
        </div>    
    </div>
</div>    
@endsection
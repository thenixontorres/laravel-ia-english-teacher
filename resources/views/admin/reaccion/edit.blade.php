@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title"> {{ $reaccion->titulo }} </h4> 
            </div>
            <div class="card-content table-responsive">                   

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
</div>    
@endsection
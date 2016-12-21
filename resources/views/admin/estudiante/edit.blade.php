@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Editar Estudiante</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::model($estudiante, ['route' => ['estudiante.update', $estudiante->id], 'method' => 'patch']) !!}

        @include('panel.estudiante.fields')

        {!! Form::close() !!}
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> {{ $evaluacion->titulo }} </h4>
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

            {!! Form::model($evaluacion, ['route' => ['admin.evaluacion.update', $evaluacion->id], 'method' => 'patch']) !!}

            @include('admin.evaluacion.fields')

            {!! Form::close() !!}
        </div>    
    </div>
</div>    
@endsection
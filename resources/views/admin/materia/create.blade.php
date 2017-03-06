@extends('layouts.app')

@section('content')
<div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> REGISTRAR MATERIA </h4>
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
                {!! Form::open(['route' => 'admin.materias.store']) !!}

                    @include('admin.materia.fields')

                {!! Form::close() !!}
            </div>    
        </div>
    </div>    
@endsection

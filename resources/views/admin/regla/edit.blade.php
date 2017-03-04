@extends('layouts.app')

@section('content')
    <div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> Editar Regla </h4>
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
    <!--entradas field -->
    <div class="form-group col-md-6">
        {!! Form::label('entrada', 'Entradas actuales:') !!}
        <hr>
        @foreach ($entradas as $entrada)
        <div class="row">
            <div class="form-group col-md-6">
               <b>{{ $entrada->entrada }}</b>  
            </div>
            <div class="form-group col-md-3">
               <b>
                    <a href="#" data-toggle="modal" data-target="#entrada_edit" class='btn btn-primary btn-xs'> <i class="glyphicon glyphicon-edit" onclick="editar_entrada({{ $entrada->id }}, '{{ $entrada->entrada }}');"></i>
                    </a>
                </b>  
            </div>
            <div class="form-group col-md-3">
               <b>
                    {!! Form::open(['route' => ['admin.entradas.destroy', $entrada->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar esta entrada?')"]) !!}
                    {!! Form::close() !!}
               </b>  
            </div>
        </div>        
        @endforeach
    </div>
    <!--respuestas field -->
    <div class="form-group col-md-6">
        {!! Form::label('respuesta', 'Respuestas actuales:') !!}
        <hr>
        @foreach ($respuestas as $respuesta)
        <div class="row">
            <div class="form-group col-md-6">
               <b>{{ $respuesta->respuesta }}</b>  
            </div>
            <div class="form-group col-md-3">
               <b>
                    <a href="#" data-toggle="modal" data-target="#respuesta_edit" class='btn btn-primary btn-xs'> <i class="glyphicon glyphicon-edit" onclick="editar_respuesta({{ $respuesta->id }}, '{{ $respuesta->respuesta }}');"></i>
                    </a>
                </b>  
            </div>
            <div class="form-group col-md-3">
               <b>
                    {!! Form::open(['route' => ['admin.respuestas.destroy', $respuesta->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar esta respuesta?')"]) !!}
                    {!! Form::close() !!}
               </b>  
            </div>
        </div>        
        @endforeach
    </div>
            {!! Form::model($regla, ['route' => ['admin.regla.update', $regla->id], 'method' => 'patch']) !!}

            @include('admin.regla.fields')

            {!! Form::close() !!}
        </div>    
    </div>
     <div class="row">
        @include('admin.regla.entrada_edit')
        @include('admin.regla.respuesta_edit')
    </div>
</div>    
@endsection
@section('scripts')
<script type="text/javascript">
//Editar entrada
function editar_entrada(id, entrada) {
    var entrada_name = document.getElementById('entrada_name');
    var entrada_id = document.getElementById('entrada_id');
    entrada_name.value = entrada;
    entrada_id.value = id;                
}

//Editar respuesta
function editar_respuesta(id, respuesta) {
    var respuesta_name = document.getElementById('respuesta_name');
    var respuesta_id = document.getElementById('respuesta_id');
    respuesta_name.value = respuesta;
    respuesta_id.value = id;                
} 

</script>
@endsection
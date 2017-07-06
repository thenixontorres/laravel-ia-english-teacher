@extends('layouts.app')

@section('content')
 <div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title"> Editar Regla </h4>
             </div>
            <div class="card-content table-responsive"> 
                <!--entradas field -->
                <div class="form-group col-md-6">
                    {!! Form::label('entrada', 'Si el estudiante escribe:') !!}
                    <hr>
                    @foreach ($entradas as $entrada)
                    <div class="row">
                        <div class="form-group col-md-6">
                            <b>{{ $entrada->entrada }}</b>  
                        </div>
                        <div class="form-group col-md-3">
                            <b>
                                <a href="#" data-toggle="modal" data-target="#entrada_edit" class='btn btn-primary btn-xs'> <i class="glyphicon glyphicon-edit" onclick="editar_entrada('{{ $entrada->id }}', '{{ $entrada->entrada }});"></i>
                                </a>
                            </b>  
                        </div>
                        <div class="form-group col-md-3">
                            <b>
                                {!! Form::open(['route' => ['profesor.entradas.destroy', $entrada->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar esta entrada?')"]) !!}
                                {!! Form::close() !!}
                            </b>  
                        </div>
                    </div>        
                    @endforeach
                    <div class="row">
                        <div class="form-group col-md-12">
                            Agregar mas entradas <a href="#" data-toggle="modal" data-target="#entrada_create" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--respuestas field -->
                <div class="form-group col-md-6">
                    {!! Form::label('respuesta', 'El bot respondera:') !!}
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
                                {!! Form::open(['route' => ['profesor.respuestas.destroy', $respuesta->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar esta respuesta?')"]) !!}
                                {!! Form::close() !!}
                            </b>  
                        </div>
                    </div>        
                    @endforeach
                    <div class="row">
                        <div class="form-group col-md-12">
                            Agregar mas respuestas <a href="#" data-toggle="modal" data-target="#respuesta_create" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
                <div class="card-content table-responsive">    
                {!! Form::model($regla, ['route' => ['profesor.reglas.update', $regla->id], 'method' => 'patch']) !!}
                @include('profesor.regla.fields')
                {!! Form::close() !!}
              </div>    
        </div>
    </div>
</div>  
     <div class="row">
        @include('profesor.regla.entrada_create')
        @include('profesor.regla.entrada_edit')
        @include('profesor.regla.respuesta_create')
        @include('profesor.regla.respuesta_edit')
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
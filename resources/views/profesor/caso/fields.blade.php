<div class="form-group col-md-12">
    <div class="row">
        @include('admin.caso.contexto_create')
    </div>
    <hr>
        @foreach($contextos as $contexto)
        <div class="row">
            <div class="form-group col-md-8" id ="{!! $contexto->id !!}" value ="{!! $contexto->contexto !!}">
               <strong> {!! $contexto->contexto !!} </strong>
            </div>
            <div class="form-group col-md-2">
                <a href="#" data-toggle="modal" data-target="#myModal" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit" onclick="editar({{ $contexto->id }}, '{{ $contexto->contexto }}');"></i></a>
            </div>
            <div class="form-group col-md-2">
            {!! Form::open(['route' => ['profesor.contextos.destroy', $contexto->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar este contexto?')"]) !!}
            {!! Form::close() !!}
            </div> 
        </div>
        <div class="row">
            <div class="form-group col-md-3">
               <b>Entrada</b>  
            </div>
            <div class="form-group col-md-3">
               <b>Respuesta</b>  
            </div>
            <div class="form-group col-md-2">
               <b>Reaccion</b>  
            </div>
            <div class="form-group col-md-1">
               <b>Destino</b>  
            </div>
            <div class="form-group col-md-1">
               <b>Puntos</b>  
            </div>
            <div class="form-group col-md-2">
               <b>Accion</b>  
            </div>
        </div>
        @foreach($contexto->reglas as $regla)
        <div class="row">
            <div class="form-group col-md-3">
                @foreach($regla->entradas as $entrada)
                    {{ $entrada->entrada.', ' }} 
                @endforeach        
            </div>
            <div class="form-group col-md-3">
                @foreach($regla->respuestas as $respuesta)
                    {{ $respuesta->respuesta.', ' }} 
                @endforeach 
            </div>
            <div class="form-group col-md-2">
            {{ $regla->reaccion->titulo }} 
            </div>
            <div class="form-group col-md-1">
            {{ $regla->apuntador->contexto }} 
            </div>
            <div class="form-group col-md-1 text-center">
            {{ $regla->puntos }}  
            </div>
            <div class="form-group col-md-2">
                 <a href="{!! route('admin.reglas.edit', [$regla->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>
                </a>
                {!! Form::open(['route' => ['admin.reglas.destroy', $regla->id], 'method' => 'delete']) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar esta regla?')"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="form-group col-md-12">
               Nueva Regla <a href="#" data-toggle="modal" data-target="#reglaCreate" class='btn btn-default btn-xs' onclick="crear({{ $contexto->id }});"><i class="glyphicon glyphicon-plus"></i>
                </a>
            </div>
        </div>
        <hr>    
        @endforeach
    <div class="row">
        @include('admin.caso.contexto_edit')
        @include('admin.caso.regla_create')
    </div>  
</div>  

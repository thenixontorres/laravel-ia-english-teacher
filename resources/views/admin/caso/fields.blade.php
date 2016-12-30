<div class="form-group col-md-12">
    <div class="row">
        @include('admin.caso.contexto_create')
    </div>
    <hr>
        @foreach($contextos as $contexto)
        <div class="row">
            <div class="form-group col-md-8" id ="{!! $contexto->id !!}" value ="{!! $contexto->contexto !!}">
                {!! $contexto->contexto !!}
            </div>
            <div class="form-group col-md-2">
                <a href="#" data-toggle="modal" data-target="#myModal" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit" onclick="editar({{ $contexto->id }}, '{{ $contexto->contexto }}');"></i></a>
            </div>
            <div class="form-group col-md-2">
            {!! Form::open(['route' => ['admin.contexto.destroy', $contexto->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar este contexto?')"]) !!}
            {!! Form::close() !!}
            </div> 
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <a href="#" data-toggle="modal" data-target="#reglaCreate" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-plus"></i>
                </a>
            </div>
        </div>    
        @endforeach
    <div class="row">
        @include('admin.caso.contexto_edit')
        @include('admin.caso.regla_create')
    </div>  
</div>  

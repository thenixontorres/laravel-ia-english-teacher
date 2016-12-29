<div class="form-group col-md-12">
    <div class="row">
        {!! Form::open(['route' => 'admin.contexto.store']) !!}
            <!-- contexto Field -->
            <div class="form-group col-md-6">
                {!! Form::label('contexto', 'Nuevo contexto:') !!}
                {!! Form::text('contexto', null, ['class' => 'form-control','required']) !!}
            </div>
            <!-- caso_id Field -->
                {!! Form::hidden('caso_id', $caso->id, ['class' => 'form-control','required']) !!}
            <!-- Submit Field -->
            <div class="form-group col-md-6">
                {!! Form::submit('Agregar', ['class' => 'btn btn-default']) !!}
            </div>                           
        {!! Form::close() !!}
    </div>
    <hr>
    <div class="row">
        @foreach($contextos as $contexto)
            <div class="form-group col-md-4">
                {!! $contexto->contexto !!}
            </div>
            <div class="form-group col-md-4">
                <a href="{!! route('admin.contexto.edit', [$contexto->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
            </div>
            <div class="form-group col-md-4">
            {!! Form::open(['route' => ['admin.contexto.destroy', $contexto->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Seguro que desea borrar este contexto?')"]) !!}
            {!! Form::close() !!}
            </div> 
        @endforeach
    </div>  
</div>  

{!! Form::open(['route' => 'admin.contextos.store']) !!}
    <div class="form-group row">
        <div class="col-md-12">
        {!! Form::submit('Nuevo contexto', ['class' => 'btn btn-primary btn-round']) !!}
        </div>
        <!-- contexto Field -->
        <div class="col-md-12">
        {!! Form::text('contexto', null, ['class' => 'form-control','required']) !!}
        </div>
        <!-- caso_id Field -->
        {!! Form::hidden('caso_id', $caso->id, ['class' => 'form-control','required']) !!}
    </div>                           
{!! Form::close() !!}
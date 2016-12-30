{!! Form::open(['route' => 'admin.contexto.store']) !!}
            <br>
            <div class="form-group row">
                <div class="col-md-2 col-md-offset-1">
                {!! Form::submit('Nuevo contexto', ['class' => 'btn btn-default']) !!}
                </div>
                <!-- contexto Field -->
                <div class="col-md-8">
                {!! Form::text('contexto', null, ['class' => 'form-control','required']) !!}
                </div>
                <!-- caso_id Field -->
                {!! Form::hidden('caso_id', $caso->id, ['class' => 'form-control','required']) !!}
            </div>                           
{!! Form::close() !!}
<div class="modal fade" id="respuesta_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Respuesta</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'profesor.respuestas.update', 'method' => 'patch']) !!}
                    <div class="form-group">
                        <label for="contexto">Respuesta: </label>
                        <!-- respuesta_id Field -->
                        <input class="form-control" required="required" name="respuesta_id" type="hidden" id="respuesta_id" value="?">
                        <!-- respuesta name Field -->
                        <input class="form-control" required="required" name="respuesta_name" type="text" id="respuesta_name" value="?">
                        <!-- Regla_id Field -->
                        {!! Form::hidden('regla_id', $regla->id, ['class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-default']) !!}
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
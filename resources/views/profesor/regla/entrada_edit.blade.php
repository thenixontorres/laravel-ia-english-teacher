<div class="modal fade" id="entrada_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Entrada</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'profesor.entradas.update', 'method' => 'patch']) !!}
                    <div class="form-group">
                        <label for="contexto">Entrada: </label>
                        <!-- entrada_id Field -->
                        <input class="form-control" required="required" name="entrada_id" type="hidden" id="entrada_id" value="?">
                        <!-- Entrada name Field -->
                        <input class="form-control" required="required" name="entrada_name" type="text" id="entrada_name" value="?">
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
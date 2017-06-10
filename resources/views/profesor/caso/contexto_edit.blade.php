<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Contexto</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'profesor.contextos.update', 'method'=>'patch']) !!}
                    <div class="form-group">
                        <label for="contexto">Contexto: </label>
                        <input class="form-control" required="required" name="contexto" type="text" id="contexto_name" value="?">
                        <!-- caso_id Field -->
                        {!! Form::hidden('caso_id', $caso->id, ['class' => 'form-control','required']) !!}
                        <!-- contexto_id Field -->
                        <input class="form-control" required="required" name="contexto_id" type="hidden" id="contexto_id" value="?">
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
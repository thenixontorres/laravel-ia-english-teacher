<div class="modal fade" id="entrada_create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Entrada</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.entradas.store']) !!}
                    <div class="form-group">
                           <!--nuevas entradas field -->
   							 {!! Form::label('entrada', 'Si el estudiante escribe:') !!}
       						 {!! Form::textarea('entrada', null, ['class' => 'form-control', 'placeholder'=> '#regla1 #regla2 #regla3 #etc','required']) !!}
    				</div>

                        <!-- Regla_id Field -->
                        {!! Form::hidden('regla_id', $regla->id, ['class' => 'form-control','required']) !!}
                    <div class="form-group">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-default']) !!}
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
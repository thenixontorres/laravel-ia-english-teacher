<div class="modal fade" id="respuesta_create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Respuesta</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'profesor.respuestas.store']) !!}
                    <div class="form-group">
                           <!--nuevas respuestas field -->
   							 {!! Form::label('respuesta', 'El bot respondera:') !!}
       						 {!! Form::textarea('respuesta', null, ['class' => 'form-control', 'placeholder'=> '#regla1 #regla2 #regla3 #etc','required']) !!}
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
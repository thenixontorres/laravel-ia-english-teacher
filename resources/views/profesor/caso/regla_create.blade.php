<div class="modal fade" id="reglaCreate" tabindex="-1" role="dialog" aria-labelledby="reglaCreateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reglaCreateLabel">Agregar regla</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'profesor.reglas.store']) !!}
                    <!--entradas field -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::label('entrada', 'Si el estudiante escribe:') !!}
                            {!! Form::textarea('entrada', null, ['class' => 'form-control', 'placeholder'=> '#regla1 #regla2 #regla3 #etc','required']) !!}
                            </div>
                        </div>
                        <!--respuesta field -->
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::label('respuesta', 'El bot respondera:') !!}
                            {!! Form::textarea('respuesta', null, ['class' => 'form-control','placeholder'=> '#respuesta1 #respuesta2 #respuesta3 #etc','required']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- reaccion Field -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            {!! Form::label('reaccion', 'Reaccionara:') !!}
                            <select name="reaccion_id" class="form-control">
                                @foreach ($reaccions as $reaccion)
                                    <option value="{{ $reaccion->id }}">{{ $reaccion->titulo }} 
                                    </option>
                                @endforeach
                            </select>
                            </div>
                         </div>   
                    </div>
                    <!-- apuntador_id Field -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            {!! Form::label('apuntador', 'Ira al contexto:') !!}
                            <select name="apuntador_id" class="form-control">
                                @foreach ($apuntadors as $apuntador)
                                    <option value="{{ $apuntador->id }}">{{ $apuntador->contexto }} 
                                    </option>
                                @endforeach
                            </select>
                            </div>
                         </div>   
                    </div>
                    <!--puntos field -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            {!! Form::label('puntos', 'Puntos:') !!}
                            <select name="puntos" class="form-control">
                                @for($i = 1; $i<'11'; $i++)
                                    <option value="{{ $i }}">{{ $i }} 
                                    </option>
                                @endfor
                            </select>
                            </div>
                         </div>   
                    </div>
                    <!--contexto_id field -->
                    <div class="form-group">
                         <input class="form-control" required="required" name="contexto_id" type="hidden" id="regla_contexto_id" value="?">
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
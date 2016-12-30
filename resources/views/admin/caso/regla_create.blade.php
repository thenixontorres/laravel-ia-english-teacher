<div class="modal fade" id="reglaCreate" tabindex="-1" role="dialog" aria-labelledby="reglaCreateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reglaCreateLabel">Agregar regla</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.regla.store']) !!}
                    <!--entradas field -->
                    <div class="form-group col-md-6">
                        {!! Form::label('entrada', 'Si el estudiante escribe:') !!}
                        {!! Form::textarea('entrada', null, ['class' => 'form-control','required']) !!}
                    </div>
                    <!--respuesta field -->
                    <div class="form-group col-md-6">
                        {!! Form::label('respuesta', 'El bot respondera:') !!}
                        {!! Form::textarea('respuesta', null, ['class' => 'form-control','required']) !!}
                    </div>
                    <!-- reaccion Field -->
                    <div class="form-group col-md-12">
                        {!! Form::label('reaccion', 'Reaccionara:') !!}
                        <select name="reaccion_id" class="form-control">
                            @foreach ($reaccions as $reaccion)
                                <option value="{{ $reaccion->id }}">{{ $reaccion->titulo }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- apuntador_id Field -->
                    <div class="form-group col-md-12">
                        {!! Form::label('apuntador', 'Ira al contexto:') !!}
                        <select name="apuntador_id" class="form-control">
                            @foreach ($apuntadors as $apuntador)
                                <option value="{{ $apuntador->id }}">{{ $apuntador->contexto }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!--puntos field -->
                    <div class="form-group col-md-12">
                        {!! Form::label('puntos', 'Puntos:') !!}
                        <select name="puntos" class="form-control">
                            @for($i = 1; $i<'11'; $i++)
                                <option value="{{ $i }}">{{ $i }} 
                                </option>
                            @endfor
                        </select>
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
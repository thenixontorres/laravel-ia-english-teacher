    <!--nuevas entradas field -->
    <div class="form-group col-md-6">
        {!! Form::label('entrada', 'Agregar mas entradas:') !!}
        {!! Form::textarea('entrada', null, ['class' => 'form-control', 'placeholder'=> '#regla1 #regla2 #regla3 #etc','required']) !!}
    </div>
    <!-- nuevas respuesta field -->
    <div class="form-group col-md-6">
        {!! Form::label('respuesta', 'Agregar mas respuestas:') !!}
        {!! Form::textarea('respuesta', null, ['class' => 'form-control','placeholder'=> '#respuesta1 #respuesta2 #respuesta3 #etc','required']) !!}
    </div>
    <!-- contexto_id Field -->
    <div class="form-group col-md-12">
        {!! Form::label('contexto', 'Contexto actual:') !!}
        <select name="contexto_id" class="form-control">
            @foreach ($contextos as $contexto)
                @if($contexto->id == $regla->contexto_id)
                <option selected value="{{ $contexto->id }}">{{ $contexto->contexto }} 
                </option>    
                @else
                <option value="{{ $contexto->id }}">{{ $contexto->contexto }} 
                </option>
                @endif
            @endforeach
        </select>
    </div>
    <!-- reaccion Field -->
    <div class="form-group col-md-12">
        {!! Form::label('reaccion', 'Reaccionara:') !!}
        <select name="reaccion_id" class="form-control">
            @foreach ($reaccions as $reaccion)
                @if($reaccion->id == $regla->reaccion_id)
                <option selected value="{{ $reaccion->id }}">{{ $reaccion->titulo }} 
                </option>    
                @else
                <option value="{{ $reaccion->id }}">{{ $reaccion->titulo }} 
                </option>
                @endif
            @endforeach
        </select>
    </div>
    <!-- apuntador_id Field -->
    <div class="form-group col-md-12">
        {!! Form::label('apuntador', 'Ira al contexto:') !!}
        <select name="apuntador_id" class="form-control">
            @foreach ($apuntadors as $apuntador)
                @if($apuntador->id == $regla->apuntador_id)
                <option selected value="{{ $apuntador->id }}">{{ $apuntador->contexto }} 
                </option>    
                @else
                <option value="{{ $apuntador->id }}">{{ $apuntador->contexto }} 
                </option>
                @endif
            @endforeach
        </select>
    </div>
    <!--puntos field -->
    <div class="form-group col-md-12">
        {!! Form::label('puntos', 'Puntos:') !!}
        <select name="puntos" class="form-control">
            @for($i = 1; $i<'11'; $i++)
                @if($i == $regla->puntos)
                <option selected value="{{ $i }}">{{ $i }} 
                </option>        
                @else
                <option value="{{ $i }}">{{ $i }} 
                </option>
                @endif
            @endfor
        </select>
    </div>
    <!--regla_id field -->
    <div class="form-group">
         <input class="form-control" required="required" name="regla_id" type="hidden" value="{{ $regla->id }}">
    </div>
    <!--contexto_id field -->
    <div class="form-group">
         <input class="form-control" required="required" name="contexto_id" type="hidden" value="{{ $regla->contexto->id }}">
    </div>
<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('admin.caso.edit', $caso_id) !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>

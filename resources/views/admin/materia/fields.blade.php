<!-- materia Field -->
<div class="form-group col-md-12">
    {!! Form::label('materia', 'Materia:') !!}
    {!! Form::text('materia', null, ['class' => 'form-control','required']) !!}
</div>

<!-- seccion Field -->
<div class="form-group col-md-12">
    {!! Form::label('seccion', 'Seccion:') !!}
    <select name="seccion_id" class="form-control">
    @foreach ($seccions as $seccion)
        <option value="{{ $seccion->id }}">{{ $seccion->seccion }} 
        </option>
    @endforeach
    </select>       
</div>

<!-- persona Field -->
<div class="form-group col-md-12">
    {!! Form::label('persona', 'Profesor:') !!}
    <select name="persona_id" class="form-control">
    @foreach ($personas as $persona)
        @if($persona->user->tipo == 'Profesor')
            <option value="{{ $persona->id }}">{{ $persona->nombre.' '.$persona->apellido.' - '.$persona->cedula }} 
            </option>
        @endif
    @endforeach
    </select>       
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('admin.materia.index') !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>

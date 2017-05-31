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
    <input type="hidden" name="persona_id" value="{{ Auth::user()->persona->id }}">

<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('home') !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>

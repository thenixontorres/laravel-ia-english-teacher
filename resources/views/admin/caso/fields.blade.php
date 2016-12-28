<!-- titulo Field -->
<div class="form-group col-md-12">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control','required']) !!}
</div>

<!-- enunciado Field -->
<div class="form-group col-md-12">
    {!! Form::label('enunciado', 'Enunciado:') !!}
    {!! Form::textarea('enunciado', null, ['class' => 'form-control','required']) !!}       
</div>
<!-- Evaluacion Field -->
<div class="form-group col-md-12">
    {!! Form::label('evaluacion', 'Evaluacion:') !!}
    <select name="evaluacion_id" class="form-control">
    @foreach ($evaluacions as $evaluacion)
        <option value="{{ $evaluacion->id }}">{{ $evaluacion->titulo }} 
        </option>
    @endforeach
    </select>       
</div>
<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('admin.caso.index') !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>

<!-- titulo Field -->
<div class="form-group col-md-12">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control','required']) !!}
</div>

<!-- tipo Field -->
<div class="form-group col-md-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <select name="tipo" class="form-control">
        <option value="Practica" selected>Practica</option>
        <option value="Prueba">Prueba</option>
    </select>       
</div>

<!-- materia Field -->
<div class="form-group col-md-12">
    {!! Form::label('materia', 'Materia:') !!}
    <select name="materia_id" class="form-control">
        @foreach ($materias as $materia)
            <option value="{{ $materia->id }}">{{ $materia->materia.' Seccion: '.$materia->seccion->seccion }} 
            </option>
        @endforeach
    </select>
</div>

<!-- estado Field -->
<div class="form-group col-md-12">
    {!! Form::label('estado', 'Estado:') !!}
    <select name="estado" class="form-control">
        <option value="Activo" selected>Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select>       
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('admin.evaluacion.index') !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>

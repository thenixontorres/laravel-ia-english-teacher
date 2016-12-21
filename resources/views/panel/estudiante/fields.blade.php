<!-- De la tabla user -->
<!-- Name Field -->
<div class="form-group col-md-12">
    {!! Form::label('name', 'Nombre de usuario:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-md-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-md-12">
    {!! Form::label('password', 'Clave:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<!-- De la tabla persona -->
<!-- Nombre Field -->
<div class="form-group col-md-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-md-12">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-md-12">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-md-12">
    {!! Form::label('foto', 'foto:') !!}
    {!! Form::text('foto', null, ['class' => 'form-control']) !!}
</div>

<!-- De la tabla estudiante -->
<!-- materia Field -->
<div class="form-group col-md-12">
    {!! Form::label('materia', 'Materia:') !!}
    {!! Form::text('materia', null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Field -->
<div class="form-group col-md-12">
    {!! Form::label('periodo', 'Periodo:') !!}
    {!! Form::text('periodo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('estudiante.index') !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>

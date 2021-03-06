<!-- De la tabla persona -->
<!-- Nombre Field -->
<div class="form-group col-md-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-md-12">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-md-12">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-md-12">
    {!! Form::label('foto', 'foto:') !!}
    {!! Form::file('foto', ['class' => 'form-control']) !!}
</div>

<!-- De la tabla user -->
<!-- Email Field -->
<div class="form-group col-md-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-md-12">
    {!! Form::label('estado', 'Estado:') !!}
    <select name="estado" class="form-control">
        <option value="Activo" selected>Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select>       
</div>

<!-- Password Field -->
<div class="form-group col-md-12">
    {!! Form::label('password', 'Clave:') !!}
        <input id="ctr1" class="form-control" type="password" name="password" required>
</div>

<!-- Clave confirm Field -->
<div class="form-group col-md-12">
        {!! Form::label('password2', 'Confirmar Clave:') !!}
        <input id="ctr2" class="form-control" type="password" name="password2" placeholder="Repita su Contraseña" required>
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('admin.personas.index') !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>


<br>
<center>
    <div class="col-md-6">
    	<img class="img img-responsive " src="{{ asset($estudiante->persona->foto) }}" alt="">
        <hr>
    </div>
</center> 
<!--De la tabla User -->
<!-- Email Field -->
<div class="form-group col-md-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $estudiante->persona->user->email !!}</p>
    <hr>
</div>
<!-- Tipo Field -->
<div class="form-group col-md-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $estudiante->persona->user->tipo !!}</p>
    <hr>
</div>
<!-- Estado Field -->
<div class="form-group col-md-12">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $estudiante->persona->user->estado !!}</p>
    <hr>
</div>
<!--De la tabla persona -->
<div class="form-group col-md-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $estudiante->persona->nombre !!}</p>
    <hr>
</div>
<div class="form-group col-md-12">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $estudiante->persona->apellido !!}</p>
    <hr>
</div>
<div class="form-group col-md-12">
    {!! Form::label('cedula', 'Cedula:') !!}
    <p>{!! $estudiante->persona->cedula !!}</p>
    <hr>
</div>
<!--De la tabla estudiante -->
<div class="form-group col-md-12">
    {!! Form::label('materia', 'Materia:') !!}
    <p>{!! $estudiante->materia->materia.' Seccion: '.$estudiante->materia->seccion->seccion !!}</p>
    <hr>
</div>
<div class="form-group col-md-12">
    {!! Form::label('periodo', 'Periodo:') !!}
    <p>{!! $estudiante->persona->cedula !!}</p>
    <hr>
</div>

<!-- Created At Field -->
<div class="form-group col-md-12">
    {!! Form::label('created_at', 'Registrado el:') !!}
    <p>{!! $estudiante->created_at !!}</p>
    <hr>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-12">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{!! $estudiante->updated_at !!}</p>
    <hr>
</div>


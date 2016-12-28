
<br>
<center>
    <div class="col-md-6">
    	<img class="img img-responsive " src="{{ asset($persona->foto) }}" alt="">
        <hr>
    </div>
</center> 
<!--De la tabla User -->
<!-- Email Field -->
<div class="form-group col-md-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $persona->user->email !!}</p>
    <hr>
</div>
<!-- Tipo Field -->
<div class="form-group col-md-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $persona->user->tipo !!}</p>
    <hr>
</div>
<!-- Estado Field -->
<div class="form-group col-md-12">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $persona->user->estado !!}</p>
    <hr>
</div>
<!--De la tabla persona -->
<div class="form-group col-md-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $persona->nombre !!}</p>
    <hr>
</div>
<div class="form-group col-md-12">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $persona->apellido !!}</p>
    <hr>
</div>
<div class="form-group col-md-12">
    {!! Form::label('cedula', 'Cedula:') !!}
    <p>{!! $persona->cedula !!}</p>
    <hr>
</div>

<!-- Created At Field -->
<div class="form-group col-md-12">
    {!! Form::label('created_at', 'Registrado el:') !!}
    <p>{!! $persona->created_at !!}</p>
    <hr>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-12">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{!! $persona->updated_at !!}</p>
    <hr>
</div>


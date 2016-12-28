<!-- materia Field -->
<div class="form-group col-md-12">
    {!! Form::label('materia', 'Materia:') !!}
    <p>{!! $materia->materia !!}</p>
    <hr>
</div>
<!-- Seccion Field -->
<div class="form-group col-md-12">
    {!! Form::label('seccion', 'Seccion:') !!}
    <p>{!! $materia->seccion->seccion !!}</p>
    <hr>
</div>
<!--persona Field -->
<div class="form-group col-md-12">
    {!! Form::label('persona', 'Profesor:') !!}
    <p>{!! $materia->persona->nombre.' '.$materia->persona->apellido.' '.$materia->persona->cedula !!}</p>
    <hr>
</div>
<!-- Created At Field -->
<div class="form-group col-md-12">
    {!! Form::label('created_at', 'Registrado el:') !!}
    <p>{!! $materia->created_at !!}</p>
    <hr>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-12">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{!! $materia->updated_at !!}</p>
    <hr>
</div>


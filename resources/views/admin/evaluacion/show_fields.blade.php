<!-- Titulo Field -->
<div class="form-group col-md-12">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $evaluacion->titulo !!}</p>
    <hr>
</div>
<!--Tipo Field -->
<div class="form-group col-md-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $evaluacion->tipo !!}</p>
    <hr>
</div>
<!--Materia Field -->
<div class="form-group col-md-12">
    {!! Form::label('materia', 'Materia:') !!}
    <p>{!! $evaluacion->materia->materia !!}</p>
    <hr>
</div>
<!-- Estado field -->
<div class="form-group col-md-12">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $evaluacion->estado !!}</p>
    <hr>
</div>
<!-- Created At Field -->
<div class="form-group col-md-12">
    {!! Form::label('created_at', 'Registrado el:') !!}
    <p>{!! $evaluacion->created_at !!}</p>
    <hr>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-12">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{!! $evaluacion->updated_at !!}</p>
    <hr>
</div>


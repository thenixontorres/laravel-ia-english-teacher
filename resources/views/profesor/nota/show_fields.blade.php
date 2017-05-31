@foreach($notas as $nota)
<!-- materia Field -->
<div class="form-group col-md-12">
    {!! Form::label('evaluacion_id', 'Evaluacion:') !!}
    <p>{!! $nota->evaluacion->titulo !!}</p>
    <hr>
</div>
<div class="form-group col-md-12">
    {!! Form::label('nota', 'Nota:') !!}
    <p>{!! $nota->nota !!}</p>
    <hr>
</div>
<div class="form-group col-md-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{!! $nota->created_at !!}</p>
    <hr>
</div>
@endforeach

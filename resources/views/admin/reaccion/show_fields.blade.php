
<br>
<center>
    <div class="col-md-6">
        <img class="img img-responsive " src="{{ asset($reaccion->reaccion) }}" alt="">
        <hr>
    </div>
</center> 

<!-- titulo Field -->
<div class="form-group col-md-12">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $reaccion->titulo !!}</p>
    <hr>
</div>
<!-- Created At Field -->
<div class="form-group col-md-12">
    {!! Form::label('created_at', 'Registrado el:') !!}
    <p>{!! $reaccion->created_at !!}</p>
    <hr>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-12">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{!! $reaccion->updated_at !!}</p>
    <hr>
</div>


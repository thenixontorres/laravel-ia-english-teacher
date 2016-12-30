<!-- titulo Field -->
<div class="form-group col-md-12">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control','required']) !!}
</div>
<!-- Reaccion Field -->
<div class="form-group col-md-12">
    {!! Form::label('reaccion', 'Imagen:') !!}
    {!! Form::file('reaccion', ['class' => 'form-control','required']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-md-12">
    <center>
    {!! Form::submit('Registrar', ['class' => 'btn btn-default']) !!}
    <a href="{!! route('admin.reaccion.index') !!}" class="btn btn-warning">Cancelar</a>
    </center>
</div>

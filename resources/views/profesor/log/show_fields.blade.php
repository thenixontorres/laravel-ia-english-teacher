<!-- materia Field -->
<div class="form-group col-md-12">
    <h4 class="text-center">{!! ($caso->titulo) !!} </h4>
</div>
	<div class="card"><strong>Tyler dijo:</strong> Hola! que tal? necesito tu ayuda.</div>
<?php $anterior = null; ?>	
@foreach ($logs as $log)
    {!! Form::label('Fecha', 'El: '.$log->created_at) !!}
    <div class="card"><strong>{{ $log->estudiante->persona->nombre.' respondio:'}}</strong> {{$log->entrada }}</div>
    @if($anterior == null)
	<?php $anterior = $log->created_at; ?>
	{!! Form::label('Fecha', $log->created_at) !!}
	@else
		<?php  $diferencia = $anterior->diffforhumans($log->created_at);
			    $anterior = $log->created_at;
		?>
		{!! Form::label('Fecha', $diferencia) !!}
	@endif
    
    <div class="card"><strong>Tyler dijo:</strong> {{$log->respuesta}}</div>
@endforeach
    {!! Form::label('Fecha', 'Fin de la conversacion.') !!}
<div class="form-group col-md-12">
<center>	
    <a href="#" class="btn btn-default">Imprimir</a>
</center>
</div>
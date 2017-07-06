<!-- materia Field -->
<div class="form-group col-md-12">
    <h4 class="text-center">{!! ($caso->titulo) !!} </h4>
</div>
	<div class="card"><strong>Tyler dijo:</strong> Hola! que tal? necesito tu ayuda.</div>
<?php $anterior = null;
	   $contextPoints = 0;	 ?>		
@foreach ($logs as $log)
    <div class="card"><strong>{{ 'Tu respondiste:'}}</strong> {{$log->entrada }}</div>
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
<hr>
<div class="form-group col-md-12">
    <center><h4>Diagnostico:</h4></center>
</div>
<div class="form-group col-md-12">
    <p class="text-justify">	El estudiante relizo {{ $count }} interaciones en la conversacion. En el transcuro se la conversacion mantuvo un {{ $coherencia }}% de coherencia en sus mensajes. Tambien mostro un {{ $elocuencia }}% de elocuencia al hablar. Por ultimo, @if($fin == true) si @else no @endif pudo completar la conversacion satisfactoriamente. </p>
</div>
<div class="form-group col-md-6">
    <p class="text-justify"><strong>Coherencia: </strong> La coherencia esta reprensentada por el porcentaje de interaciones donde se recibio un mensaje que el bot fue capaz de reconocer e interpretar.</p>
</div>
<div class="form-group col-md-6">
    <p class="text-justify"><strong>Elocuencia: </strong> La elocuencia esta reprensentada la capacidad que tuvo el estudiante para desplazarse a traves de los distintos contextos de la conversacion.</p>
</div>
<div class="form-group col-md-12">
<center>	
    <a href="#" class="btn btn-default">Imprimir</a>
</center>
</div>
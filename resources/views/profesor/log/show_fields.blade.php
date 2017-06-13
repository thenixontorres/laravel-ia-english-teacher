<!-- materia Field -->
<div class="form-group col-md-12">
    <h4 class="text-center">{!! ($caso->titulo) !!} </h4>
</div>
@foreach ($logs as $log)
    {!! Form::label('Fecha', 'El: '.$log->created_at) !!}
    @if($log->entrada->entrada == 'default')    
    <div class="card"><strong>{{ $log->estudiante->persona->nombre.' dijo:'}}</strong> "Algo que el bot no fue capas de comprender"</div>
    @else
    <div class="card"><strong>{{ $log->estudiante->persona->nombre.' Dijo:'}}</strong> {{$log->entrada->entrada }}</div>
    @endif
    <div class="card"><strong>Bot respondio:</strong> {{$log->respuesta->respuesta}}</div>
@endforeach
    {!! Form::label('Fecha', 'Fin de la conversacion.') !!}

@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">{{ $caso->titulo }}</h4>
            </div>
            <div class="card-content table-responsive">        
                <div class="row">
                    <div class="col-md-3">
                        @if(isset($reaccion))
                            <img src="{{ asset($reaccion->reaccion)}}" class="img img-responsive">
                            <center>
                            {{'Contexto: '.$contexto_actual->contexto}}
                            </center>
                        @else
                            <img src="{{ asset('/img/reaccions/neutral.png')}}" class="img img-responsive">
                            <center>
                            {{'Contexto: '.$contexto_actual->contexto}}
                            </center>
                        @endif
                    </div>
                    <div class="col-md-9">
                        @if(isset($respuesta))
                            <div class="card"><strong>Tu dijiste:</strong> {{$mensaje}}</div>
                            <div class="card"><strong>Bot respondio:</strong> {{$respuesta->respuesta}}</div>
                        @else
                            <div class="card"><strong> Bot dice: </strong> Hola! que tal? necesito tu ayuda. </div>
                        @endif
                    </div>
                </div>  
                @if(isset($fin))
                    @if($fin == false)
                    {!! Form::open(['route' => 'estudiante.logs.store']) !!}    
                       <hr>
                        <div class="form-group col-md-8">
                        {!! Form::text('mensaje', null, ['class' => 'form-control', 'placeholder'=> 'Escribe tu mensaje','required']) !!}
                            <!--contexto actual -->
                            <input type="hidden" name="contexto_actual" value="{{ $contexto_actual->id }}">
                            <!-- caso actual -->
                            <input type="hidden" name="caso_id" value="{{ $caso->id }}">
                            </div>
                            <div class="form-group col-md-4">
                            <center>
                            {!! Form::submit('Enviar', ['class' => 'btn btn-default']) !!}
                            </center>
                            </div>
                    {!! Form::close() !!}
                    @endif
                @else
                    {!! Form::open(['route' => 'estudiante.logs.store']) !!}    
                       <hr>
                        <div class="form-group col-md-8">
                        {!! Form::text('mensaje', null, ['class' => 'form-control', 'placeholder'=> 'Escribe tu mensaje','required']) !!}
                            <!--contexto actual -->
                            <input type="hidden" name="contexto_actual" value="{{ $contexto_actual->id }}">
                            <!-- caso actual -->
                            <input type="hidden" name="caso_id" value="{{ $caso->id }}">
                            <!--tipo de evaluacion -->
                            <input type="hidden" name="tipo_evaluacion" value="prueba">
                            </div>
                            <div class="form-group col-md-4">
                            <center>
                            {!! Form::submit('Enviar', ['class' => 'btn btn-default']) !!}
                            </center>
                            </div>
                    {!! Form::close() !!}
                @endif   
            </div>  
        </div>
    </div>   
</div>            
@endsection


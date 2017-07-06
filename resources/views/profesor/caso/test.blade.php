@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">{{ $caso->titulo }}</h4>
            </div>
            <div class="card-content table-responsive">        
            	<!-- mensaje del usuario -->
                @if(isset($respuesta))
                <div class="row" id="user-messege">
                    <div class="col-md-9">
                           <div class="card"><strong>Tu dijiste:</strong> {{$mensaje}}</div>  
                    </div>
                    <div class="col-md-3">
                            <img src="{{ asset(Auth::user()->persona->foto) }}" class="img img-responsive">
                            <center>
                            {{Auth::user()->persona->nombre}}
                            </center>
                    </div>
                </div>
                @endif
                <!-- respuesta del bot -->
                <div class="row" id="bot-messege">
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
		            		<div class="card"><strong>Tyler respondio: </strong>{{$respuesta->respuesta}}</div>
		            	@else
		            		<div class="card"><strong> Bot dice: </strong> Hello! {{ Auth::user()->persona->nombre }}, it's me, again. Today I need your help. </div>
		            	@endif
	            	</div>
            	</div>	
            	@if(isset($fin))
                    @if($fin == false)
                    {!! Form::open(['route' => 'profesor.logs.chat', 'autocomplete' => 'off']) !!}    
                       <hr>
                        <div class="form-group col-md-8">
                        {!! Form::text('mensaje', null, ['class' => 'form-control', 'placeholder'=> 'Escribe tu mensaje','required']) !!}
                            <input type="hidden" name="tipo_evaluacion" value="practica">
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
                    {!! Form::open(['route' => 'profesor.logs.chat']) !!}    
                       <hr>
                        <div class="form-group col-md-8">
                        {!! Form::text('mensaje', null, ['class' => 'form-control', 'placeholder'=> 'Escribe tu mensaje','required','autocomplete' => 'off']) !!}
                            <!--practica profesor -->
                            <!--contexto actual -->
                            <input type="hidden" name="contexto_actual" value="{{ $contexto_actual->id }}">
                            <!-- caso actual -->
                            <input type="hidden" name="caso_id" value="{{ $caso->id }}">
                            <!--tipo de evaluacion -->
                            <input type="hidden" name="tipo_evaluacion" value="practica">
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


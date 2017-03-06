@extends('layouts.app')

@section('content')
<div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> {!! $estudiante->persona->nombre.' '.$estudiante->persona->apellido !!} </h4>
    </div>
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/right.png') }}" alt="">
    </div>      
</div>
<div class="row">
    <div class="col-md-2">
        @include('layouts.elements.panel')
    </div>
    <div class="col-md-10">
        <div class="row panel panel-default">
   			@include('admin.estudiante.show_fields')
		    <div class="form-group col-md-12">
		           <center>
		           		<a href="{!! route('admin.estudiantes.index') !!}" class="btn btn-default">Volver</a>
		           </center>	
		    </div>
		</div>
	</div>
</div>		    
@endsection

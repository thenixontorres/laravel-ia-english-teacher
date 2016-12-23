@extends('layouts.app')

@section('content')
<div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> ESTUDIANTES </h4>
    </div>
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/right.png') }}" alt="">
    </div>      
</div>
	 <div class="row row-fluid">	
	  	<div class="col-md-2">
            @include('layouts.elements.panel')
        </div>
        <div class="col-md-10 panel panel-default">  
            <a class="btn btn-primary pull-right nav-li" style="margin-top: 25px" href="{!! route('admin.estudiante.create') !!}">Agregar</a>
            <div class="clearfix"></div>
            @include('admin.estudiante.table')
        </div>
    </div>
    <br>    
@endsection
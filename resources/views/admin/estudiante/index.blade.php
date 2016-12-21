@extends('layouts.app')

@section('content')
	 <div class="row row-fluid">	
	  	<div class="col-md-10 board">  
        <h1 class="pull-left">Estudiantes</h1>
        <a class="btn btn-primary pull-right nav-li" style="margin-top: 25px" href="{!! route('estudiante.create') !!}">Agregar</a>
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        @include('panel.estudiante.table')
    </div>
    </div>
    <br>    
@endsection
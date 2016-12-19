@extends('layouts.app')
@section('content')
<!--Si el usuario es estudiante -->
	@include('estudiante.sections.inicio')	
	@include('estudiante.sections.practicas')
	@include('estudiante.sections.evaluaciones') 	
<!--Si el usuario es Profesor 
	@include('profesor.sections.inicio')	
	@include('profesor.sections.practicas')
	@include('profesor.sections.evaluaciones')
Si el usuario es Admin -->

@endsection
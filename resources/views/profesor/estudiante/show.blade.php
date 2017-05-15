@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <a class="btn btn-default" href="{!! route('profesor.estudiantes.create') !!}">Agregar Nuevo Estudiante</a>
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">{!! $materia->materia !!} </h4>
            </div>
            <div class="card-content table-responsive">                   
                @include('profesor.estudiante.table')
		    </div>  
        </div>
    </div>   
</div>        		    
@endsection

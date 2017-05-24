@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">Registrar Materias</h4>
            </div>
            <div class="card-content table-responsive">                   
               {!! Form::open(['route' => 'profesor.materias.store']) !!}

                    @include('profesor.materia.fields')

                {!! Form::close() !!}
            </div>  
        </div>
    </div>   
</div>   
@endsection

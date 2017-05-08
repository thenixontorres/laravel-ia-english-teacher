@extends('layouts.app')

@section('content')
   <div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title"> {{ $materia->materia }} </h4>
            </div>
        <div class="card-content table-responsive">

            {!! Form::model($materia, ['route' => ['admin.materias.update', $materia->id], 'method' => 'patch']) !!}

            @include('admin.materia.fields')

            {!! Form::close() !!}
        </div>    
        </div>
    </div>
</div>      
@endsection
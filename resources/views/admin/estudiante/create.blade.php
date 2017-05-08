@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">Registrar Caso</h4>
            </div>
            <div class="card-content table-responsive">                   
                {!! Form::open(['route' => 'admin.estudiantes.store', 'files' => true, 'onsubmit' => 'return contras();']) !!}

                    @include('admin.estudiante.fields')

                {!! Form::close() !!}
            </div>  
        </div>
    </div>   
</div>  
@endsection
@section('scripts')
    <script src="{{ asset('/js/funciones.js') }}"></script>
@endsection
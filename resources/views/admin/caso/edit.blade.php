@extends('layouts.app')

@section('content')
    <div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> {{ $caso->titulo }} </h4>
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

            @include('admin.caso.fields')

        </div>    
    </div>
</div>    
@endsection
@section('scripts')
<script type="text/javascript">

function editar(id,contexto) {
    var contexto_name = document.getElementById('contexto_name');
    var contexto_id = document.getElementById('contexto_id');
    contexto_name.value = contexto;
    contexto_id.value = id;                
} 

function crear(id) {
    var regla_contexto_id = document.getElementById('regla_contexto_id');
    regla_contexto_id.value = id;                
} 
</script>
@endsection

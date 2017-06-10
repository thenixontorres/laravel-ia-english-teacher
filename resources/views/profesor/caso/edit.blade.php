@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">{{ $caso->titulo }}</h4>
            </div>
         <div class="card-content table-responsive">                   
            @include('admin.caso.fields')
        </div>  
    </div>
</div>          
@endsection
@section('scripts')
<script type="text/javascript">
//Editar Contexto
function editar(id,contexto) {
    var contexto_name = document.getElementById('contexto_name');
    var contexto_id = document.getElementById('contexto_id');
    contexto_name.value = contexto;
    contexto_id.value = id;                
} 

//Crear Regla
function crear(id) {
    var regla_contexto_id = document.getElementById('regla_contexto_id');
    regla_contexto_id.value = id;                
} 
 
</script>
@endsection

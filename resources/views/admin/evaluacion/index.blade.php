@extends('layouts.app')

@section('content')
<div class="row" id="inicio">
    <div class="col-md-2 "> 
        <img class="img img-responsive " src="{{ asset('img/left.png') }}" alt="">
    </div>
    <div class="col-md-8">  
        <h4 class="text-center"> EVALUACIONES </h4>
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
            <a class="btn btn-default pull-right nav-li" style="margin-top: 25px" href="{!! route('admin.evaluacions.create') !!}">Agregar</a>
            <div class="clearfix"></div>
            @include('admin.evaluacion.table')
        </div>
    </div>
    <br>    
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "lengthMenu": "Ver _MENU_ entradas por pagina",
                "zeroRecords": "No se encontraron resultados",
                "info": "Viendo la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay informacion",
                "search": "Buscar: ",
                "paginate": {
                    "previous": "Anterior ",
                    "next": " Proximo",
                }
            }
        });
    } );
</script>
@endsection

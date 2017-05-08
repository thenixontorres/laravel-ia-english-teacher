@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h4 class="title">Evaluaciones</h4>
               <a href="{!! route('admin.evaluacions.create') !!}">Agregar nueva Evaluacion</a>
            </div>
            <div class="card-content table-responsive"> 
            @include('admin.evaluacion.table')
        </div>  
        </div>
    </div>   
</div>          
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

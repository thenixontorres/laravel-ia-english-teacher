@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="orange">
                    <h4 class="title">{{ $estudiante->persona->nombre.' '.$estudiante->persona->apellido.' '.$estudiante->persona->cedula }}</h4>
            </div>
            <div class="card-content table-responsive">                   
                <table class="table table-responsive" id="table">
                    <thead>
                        <th>Evaluacion</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                    @foreach($evaluacions as $evaluacion)
                        @if($evaluacion->tipo == 'Prueba')
                        <tr>
                            <td>{!! $evaluacion->titulo !!}</td>
                            <td>
                                <div class='btn-group'>
                                    <a href="{!! route('profesor.logs.prof_show', [$estudiante->id, $evaluacion->id]) !!}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
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

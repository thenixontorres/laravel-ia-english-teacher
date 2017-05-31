<table class="table table-responsive" id="table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Materia</th>
        <th>Estado</th>
        <th>Periodo</th>
        <th>Acciones</th>
        <th>Ver Notas</th>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
        <tr>
            <td>{!! $estudiante->persona->nombre !!}</td>
            <td>{!! $estudiante->persona->apellido !!}</td>
            <td>{!! $estudiante->persona->cedula !!}</td>
            <td>{!! $estudiante->materia->materia.' Seccion '.$estudiante->materia->seccion->seccion !!}</td>
            <td>{!! $estudiante->persona->user->estado !!}</td>
            <td>{!! $estudiante->periodo->periodo !!}</td>
            {!! Form::open(['route' => ['profesor.estudiantes.destroy', $estudiante->id], 'method' => 'delete']) !!}
            <td>
                <div class='btn-group'>
                    <a href="{!! route('profesor.estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro que desea borrar este estudiante?')"]) !!}
            </td>
            {!! Form::close() !!} --> 
            <td>
                <div class='btn-group'>
                    <a href="{!! route('profesor.estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
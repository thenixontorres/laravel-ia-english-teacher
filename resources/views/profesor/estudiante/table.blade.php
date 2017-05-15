<table class="table table-responsive" id="table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Materia</th>
        <th>Estado</th>
        <th>Editar</th>
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
            <td>
                <div class='btn-group'>
                    <a href="{!! route('profesor.estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('profesor.estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
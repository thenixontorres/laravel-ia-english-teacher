<table class="table table-responsive" id="table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Materia</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
        <tr>
            <td>{!! $estudiante->persona->nombre !!}</td>
            <td>{!! $estudiante->persona->apellido !!}</td>
            <td>{!! $estudiante->persona->cedula !!}</td>
            <td>{!! $estudiante->materia->materia.' Seccion '.$estudiante->materia->seccion->seccion !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.estudiante.destroy', $estudiante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.estudiante.show', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.estudiante.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
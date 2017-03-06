<table class="table table-responsive" id="table">
    <thead>
        <th>Materia</th>
        <th>Seccion</th>
        <th>Profesor</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($materias as $materia)
        <tr>
            <td>{!! $materia->materia !!}</td>
            <td>{!! $materia->seccion->seccion !!}</td>
            <td>{!! $materia->persona->nombre.' '.$materia->persona->apellido.' '.$materia->persona->cedula !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.materias.destroy', $materia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.materias.show', [$materia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.materias.edit', [$materia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro que desea borrar esta materia?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
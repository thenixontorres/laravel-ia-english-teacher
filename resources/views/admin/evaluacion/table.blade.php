<table class="table table-responsive" id="table">
    <thead>
        <th>Titulo</th>
        <th>Tipo</th>
        <th>Materia</th>
        <th>Estado</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($evaluacions as $evaluacion)
        <tr>
            <td>{!! $evaluacion->titulo !!}</td>
            <td>{!! $evaluacion->tipo !!}</td>
            <td>{!! $evaluacion->materia->materia !!}</td>
            <td>{!! $evaluacion->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.evaluacion.destroy', $evaluacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.evaluacion.show', [$evaluacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.evaluacion.edit', [$evaluacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro que desea borrar esta evaluacion?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
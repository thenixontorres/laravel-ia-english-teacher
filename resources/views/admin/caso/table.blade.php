<table class="table table-responsive" id="table">
    <thead>
        <th>Titulo</th>
        <th>Evaluacion</th>
        <th>Tipo</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($casos as $caso)
        <tr>
            <td>{!! $caso->titulo !!}</td>
            <td>{!! $caso->evaluacion->titulo !!}</td>
            <td>{!! $caso->evaluacion->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.caso.destroy', $caso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.caso.show', [$caso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.caso.edit', [$caso->id]) !!}" class='btn btn-primary btn-xs'>Enseñar reglas</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro que desea borrar esta este Bot?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
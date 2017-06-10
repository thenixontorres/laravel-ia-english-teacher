<table class="table table-responsive" id="table">
    <thead>
        <th>Titulo</th>
        <th>Tipo</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($casos as $caso)
        <tr>
            <td>{!! $caso->titulo !!}</td>
            <td>{!! $caso->evaluacion->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['profesor.casos.destroy', $caso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('profesor.casos.edit', [$caso->id]) !!}" class='btn btn-primary btn-xs'>Enseñar reglas</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro que desea borrar esta este Bot?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-default" href="{!! route('profesor.casos.micaso', $evaluacion->id) !!}"><i class="glyphicon glyphicon-plus"></i></a>
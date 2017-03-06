<table class="table table-responsive" id="table">
    <thead>
        <th>Titulo</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($reaccions as $reaccion)
        <tr>
            <td>{!! $reaccion->titulo !!}</td>
                {!! Form::open(['route' => ['admin.reaccions.destroy', $reaccion->id], 'method' => 'delete']) !!}
            <td><div class='btn-group'>
                    <a href="{!! route('admin.reaccions.show', [$reaccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{!! route('admin.reaccions.edit', [$reaccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro que desea borrar esta reaccion?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
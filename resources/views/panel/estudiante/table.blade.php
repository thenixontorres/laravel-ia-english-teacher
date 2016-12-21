<table class="table table-responsive" id="mes-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($mes as $mes)
        <tr>
            <td>{!! $mes->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['mes.destroy', $mes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mes.show', [$mes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mes.edit', [$mes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
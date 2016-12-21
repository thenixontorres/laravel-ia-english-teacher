@extends('layouts.app')

@section('content')
    @include('panel.estudiante.show_fields')

    <div class="form-group">
           <a href="{!! route('estudiante.index') !!}" class="btn btn-default">Volver</a>
    </div>
@endsection

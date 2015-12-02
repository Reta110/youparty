@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Usuarios</div>

                    <div class="panel-body">

                        @include('common.errorFields')

                        {!! Form::open(['route' => 'channels.store', 'method' => 'POST']) !!}
                        @include('channels.partials.fields')
                        <button type="submit" class="btn btn-default">Crear</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crea tu canal</div>

                    <div class="panel-body">

                        @include('partials.errorFields')

                        {!! Form::open(['route' => 'channel.store', 'method' => 'POST','files' => 'true', 'class' => 'form-inline'] ) !!}
                        @include('channels.partials.fields')
                        <button type="submit" class="btn btn-success">Crear canal</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

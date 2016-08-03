@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenido al panel de control</div>

                    <div class="panel-body">

                        <h3>Crear canal:</h3>

                        @include('partials.errorFields')

                        {!! Form::open(['route' => 'channel.store', 'method' => 'POST', 'class' => 'form-inline']) !!}
                        @include('channels.partials.fields')
                        <button type="submit" class="btn btn-default">Crear canal</button>
                        {!! Form::close() !!}

                        @if(count($channels) >0)
                            <h3>Tus canales:</h3>
                            <table class="table table-responsive">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Entrar</th>
                                    <th>Visualizar</th>
                                </tr>
                                @foreach($channels as $channel)
                                    <tr>
                                        <td>{{$channel->name}}</td>
                                        <td><a href="{{route("channel.show", $channel)}}"
                                               class="btn btn-success">Entrar al canal</a>
                                        </td>
                                        <td><a href="{{route("youparty.show", $channel)}}"
                                               class="btn btn-primary">Colocar a visualizar Canal</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

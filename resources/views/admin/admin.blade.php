@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenido al panel de control</div>

                    <div class="panel-body">

                        @include('partials.errorFields')
                        @include('partials.success')

                        <h3>Crear canal:</h3>

                        @if(count($channels) <0)
                            <br>
                            <div class="alert alert-info">
                                <ul>
                                    <li>Luego de crearlo, coloca a visualizar tu canal en una pantalla donde todos
                                        vean.
                                    </li>
                                    <li>Indica a tus amigos el nombre de tu canal para que puedan agregar los videos.
                                    </li>
                                </ul>
                            </div>
                        @endif


                        {!! Form::open(['route' => 'channel.store', 'method' => 'POST','files' => 'true', 'class' => 'form'] ) !!}
                        @include('channels.partials.fields')
                        <button type="submit" class="btn btn-success center-block">Crear canal</button>
                        {!! Form::close() !!}

                        @if(count($channels) >0)

                            <h3>Tus canales:</h3>
                            <table class="table table-responsive">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Entrar</th>
                                    <th>Visualizar</th>
                                    <th>Acciones</th>
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
                                        <td>
                                            {!! Form::open(['route' => ['channel.delete', $channel], 'method' => 'POST','class' => 'form-inline'] ) !!}
                                            <button type="submit" class="btn btn-danger">Elimiar canal</button>
                                            {!! Form::close() !!}
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

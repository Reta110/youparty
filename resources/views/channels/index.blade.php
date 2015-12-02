@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Bienvenido</h1>
                <img src="{{url('images/youparty.jpg')}}" class="img-responsive">
                <div class="panel panel-default panel-info">

                    <div class="panel-heading">
                        Listado de Canales
                        <a href="{{url('channels/create')}}" class="btn-xs btn-primary pull-right" role="button">Nuevo Canal</a>
                    </div>

                    <div class="panel-body">
                        <p>Puedes crear un canal personal o visualizar uno existente. Recuerda entrar para agregar videos al canal seleccionado.
                            La idea es colocar un dispositivo a visualizar un canal, mientras los usuarios pueden incluir videos desde otros.</p>
                        @foreach($channels as $channel)
                            <div class="col-md-4">
                            Nombre: {{$channel->name}} <br>
                            Alias: {{$channel->nick_name}}<br>
                                <a href="channel/{{$channel->id}}">Entrar</a> -
                                <a href="show/{{$channel->id}}">Visualizar Canal</a>
                            <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Bienvenido</h1>
                <img src="{{url('images/youparty.jpg')}}" class="img-responsive">
                <div class="panel panel-default panel-info">

                    <div class="panel-heading">
                        <div class="col-md-4">Listado de Canales</div>
                        <div class="col-md-4">
                            <div class="fb-share-button center-block" data-href="http://youparty.com.ve/" data-layout="button_count"></div>
                        </div>
                        <div class="col-md-4"><a href="{{url('channel/create')}}" class="btn-xs btn-primary pull-right" role="button">Nuevo Canal</a></div>
                        <br>
                    </div>

                    <div class="panel-body">
                        <div class="alert alert-info">
                            <p>Puedes crear un canal personal o visualizar uno existente. Recuerda entrar para agregar videos al canal seleccionado.</p>

                            <ol>
                                <li>Crear un canal nuevo canal. <a href="http://youparty.com.ve/channel/create" class="btn-xs btn-primary">Crear canal</a> </li>
                                <li>Busca tu canal y dale click en "Visualizar canal" (puede ser tu misma laptop)</li>
                                <li>Ojo: desde otro dipositivo (puede ser celular u otro)entras también a la página, buscas tu canal
                                    y le das click a "Entrar"</li>
                                <li>Agrega tu primer video a la lista de reproducción.</li>
                            </ol>
                        </div>
                        @foreach($channels as $channel)
                            <div class="col-md-4">
                                <h4>{{$channel->name}} </h4> <br>
                                <a href="channel/{{$channel->id}}" class="btn btn-success">Entrar</a> -
                                <a href="show/{{$channel->id}}" class="btn btn-primary">Visualizar Canal</a>
                            <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


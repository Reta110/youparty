@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Listado de Canales</h1>

                <div class="panel panel-default panel-info">

                    <div class="panel-heading">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="fb-share-button center-block" data-href="http://youparty.com.ve/"
                                 data-layout="button_count"></div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="alert alert-warning">
                            <p>Para poder crear tu propio canal, debes de estar registrado.</p>
                        </div>
                        @foreach($channels as $channel)
                            <div class="col-md-4">
                                <h4>{{$channel->name}} </h4> <br>
                                <a href="channel/{{$channel->id}}" class="btn btn-success text-center">Entrar al
                                    canal</a>
                                <hr>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            {{ $channels->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


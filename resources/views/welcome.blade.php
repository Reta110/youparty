@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Bienvenido</h1>
                <img src="{{url('images/youparty.jpg')}}" class="img-responsive">

                    <div class="alert alert-info">
                        <h4>Para invitados</h4>
                        <ol>
                            <li>Busca el canal y entra para comenzar a agregar videos</li>
                        </ol>

                        <h4>Para crear tu propio canal</h4>
                        <ol>
                            <li>Debes <a href="{{url('/register')}}">registrarte</a></li>
                            <li>Crear el canal</li>
                            <li>Visualiza tu canal en una pantalla donde todos vean</li>
                            <li>Indica a tus amigos el nombre de tu canal para que puedan agregar los videos</li>
                        </ol>
                    </div>
            </div>
        </div>
    </div>
@endsection


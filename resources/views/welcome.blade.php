@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Bienvenido</h1>
                <p class="bg-primary" style="padding: 15px; color:white">Youparty, la rockola digital. Tus invitados podrán crear una lista de reproducción de forma sencilla y personalizada con música de su preferencia, sin importar su SO y sin instalar app. </p>
                <a href="channels">
                    <img src="{{url('images/youparty.jpg')}}" class="img-responsive">
                </a>

                <div class="alert alert-info">
                    <h2>Instrucciones</h2>
                    <h4>Para invitados</h4>
                    <ol>
                        <li>Es muy fácil, solo debes de ir a la seeción de
                            <a href="{{ route('channels') }}">canales</a>
                            , selecciona el de tu preferencia y listo. Ya puedes agregar videos al canal.
                        </li>
                    </ol>

                    <h4>Para crear tu propio canal:</h4>

                    <ol>
                        <li>Debes de estar  <a href="{{url('/register')}}">registrado</a></li>
                        <li>Luego vas al admin y creas tu nuevo canal.</li>
                        <li>Recuerda colocar a visualiza tu canal en una pantalla donde todos tus usuarios puedan ver.</li>
                        <li>Indica a tus usuarios el nombre de tu canal, para que puedan agregar los videos de su preferencia.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection


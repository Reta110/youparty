@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
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
                        <li>Debes de estar <a href="{{url('/register')}}">registrado</a></li>
                        <li>Vas al  <a href="{{url('/admin')}}">registrado</a> y creas tu nuevo canal.</li>
                        <li>Ccoloca a visualiza tu canal en una pantalla donde todos tus usuarios puedan ver.
                        </li>
                        <li>Listo, usuarios pueden entrar y agregar los videos
                            de su preferencia.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido al panel de control</div>

                <div class="panel-body">

                    <h2>Tus canales:</h2>

                    @foreach($channels as $channel)
                        <div class="col-md-4">
                            <h4>{{$channel->name}} </h4> <br>
                            <a href="{{route("youparty.show", ['id' => $channel->id])}}" class="btn btn-primary">Visualizar Canal</a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

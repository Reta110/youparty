@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @include('partials.success')

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h3>Canal: {{ $channel->name }}</h3>


                        {!! Form::open(['route' => ['search.word',$channel], 'method' => 'GET', 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            <input type="text" name="word" value="{{ old('word')}}" class='form-control'>

                            <button type="submit" class="btn btn-default">Buscar</button>
                            <p class="text-info">Selecciona el video que deseas agregar.</p>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="panel-body">

                            @include('videos.partials.videosListSearch')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
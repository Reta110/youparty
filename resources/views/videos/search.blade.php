@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        @include('partials.success')

                        <h3>Canal: {{ $channel->name }}</h3>


                        {!! Form::open(['route' => ['search.word',$channel], 'method' => 'GET', 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            {!! form::label('word','Busca  un video:')!!}
                            <input type="text" name="word" value="{{ old('word')}}" class='form-control'">

                            <button type="submit" class="btn btn-default">Buscar</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="panel-body">

                        <div class="row">
                            @include('videos.partials.videosListSearch')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
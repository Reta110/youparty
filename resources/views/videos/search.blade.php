@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        @include('partials.success')

                        <div class="col-md-10">
                        <h3>Canal: {{ $channel->name }}</h3>
                            </div>
                        <div class="col-md-2 pull-right">
                        <img src="{{url('images/channels/'.$channel->id.'.jpg')}}" class="img-responsive">
                        </div>

                        {!! Form::open(['route' => ['search.word',$channel], 'method' => 'GET', 'class' => 'form form-inline']) !!}
                        <div class="form-group">

                            <input type="text" name="word" value="{{ old('word')}}" class='form-control'>

                            <button type="submit" class="btn btn-default">Buscar video</button>

                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="panel-body">

                            @include('videos.partials.videoList')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
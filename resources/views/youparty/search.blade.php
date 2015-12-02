@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        {!! Form::open(['route' => 'search.create', 'method' => 'POST', 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            {!! form::label('search','Buscar')!!}
                            {!! form::text('search',null,['class' => 'form-control']) !!}
                            <input type="hidden" name="channel_id" value="{{$channel_id}}" />
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="panel-body">

                        <div class="row">
                            @if($videos != null)
                                @foreach($videos as $video)
                                    <div class="col-sm-6 col-md-6">
                                        <div class="thumbnail">
                                            <img src="{{$video->snippet->thumbnails->medium->url}}">
                                            <div class="caption">
                                                <h3>{{$video->snippet->title}}</h3>

                                                {!! Form::open(['route' => 'search.save', 'method' => 'POST', 'class' => 'form-inline']) !!}
                                                <div class="form-group">
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                                    <input type="hidden" name="url" value="{{{$video->id->videoId}}}" />
                                                    <input type="hidden" name="channel_id" value="{{$channel_id}}" />
                                                    <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Agregar</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('css')
    <link href="http://lastfm-autocomplete.amuzi.me/lastfm-autocomplete.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        @include('partials.success')
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-6">
                                <h3>{{ $channel->name }}</h3>
                            </div>
                            <div class="col-md-2 pull-right col-sm-6 col-xs-6">
                                <img src="{{url('images/channels/'.$channel->id.'.jpg')}}" class="img-responsive">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::open(['route' => ['search.word',$channel], 'method' => 'GET', 'class' => 'form form-inline']) !!}
                                <div class="form-group">

                                    <input type="text" name="word" value="{{ old('word')}}" class='form-control'
                                           required="true" id="search">


                                </div>
                                <button type="submit" class="btn btn-default">Buscar video</button>
                            </div>
                            {!! Form::close() !!}

                            <div class="col-md-3 col-md-pull-2 pull-right">
                                @can('isOwnerOfChannel', $channel)

                                    <a href="{{route("youparty.show", $channel)}}"
                                       class="btn btn-primary center-block">Colocar a visualizar Canal</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        @include('videos.partials.videoList')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous">

    </script>
    <script src="http://lastfm-autocomplete.amuzi.me/lastfm-autocomplete.js"></script>

    <script type="text/javascript">
        (function ($) {
            'use strict';

            function handleAutocompleteChoice(e, ui) {
                var d = ui.item;

                if (null !== d) {
                    $('#value').html(d.value);
                    $('#category').html(d.category);
                    $('#artist').html(d.artist);
                    $('#musicTitle').html(d.musicTitle);
                    $('#label').html('<pre>' + d.label + '</pre>');
                    $('#data').html(d.data);
                    $('#lastfm').html(JSON.stringify(d.lastfm));
                }
            }

            $(document).ready(function () {
                var acOptions = {
                    callback: handleAutocompleteChoice,
                    modules: ['artist', 'track'],
                    apiKey: '0e32d55ef76a52129ad36da460120d44'
                };

                $('#search').lfmComplete(acOptions);
            });
        }(jQuery));
    </script>
@endsection
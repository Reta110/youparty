@extends('layouts.simple')

@section('content')

    <div style="position: fixed; z-index: -99; width: 100%; height: 100%">
        <iframe frameborder="0" height="100%" width="100%"
                src="https://youtube.com/embed/@if($video != null){{$video->videoId}}@endif?autoplay=1&controls=0&showinfo=0&autohide=1">
        </iframe>
    </div>

    @if(isset($video->user))
        <h2 class="pull-right bottom " style=" position: absolute;bottom: 0; right: 120px;">
            {{$video->user->nick }}
        </h2>
        <div style="position:absolute;bottom:5px;right:5px;margin:0;padding:5px 3px;">
            <img  class='img-rounded' src="{{$video->user->avatar}}">
        </div>
    @endif
@endsection

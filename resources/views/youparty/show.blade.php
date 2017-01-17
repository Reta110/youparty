@extends('layouts.simple')

@section('content')

    <div style="position: fixed; z-index: -99; width: 100%; height: 100%">
        <iframe frameborder="0" height="100%" width="100%"
                src="https://youtube.com/embed/@if($video != null){{$video->videoId}}@endif?autoplay=1&controls=0&showinfo=0&autohide=1">
        </iframe>
    </div>

    <div class="pull-right " style="position:absolute;bottom:5px;right:5px;margin:0;padding:5px 3px;">{{$video->user->name  }}<img src="{{$video->user->avatar}}"></div>

@endsection

@extends('simple')
<script>
    setTimeout(function(){
        window.location.reload(1);
    },  @if($video != null)
            {{$time}}
        @else
        10000
        @endif
    );

    var notify = $.notify('<strong>Saving</strong> Do not close this page...', {
        type: 'success',
        allow_dismiss: false,
        showProgressbar: true
    });

    setTimeout(function() {
        notify.update('message', '<strong>Saving</strong> Page Data.');
    }, 1000);

    setTimeout(function() {
        notify.update('message', '<strong>Saving</strong> User Data.');
    }, 2000);

    setTimeout(function() {
        notify.update('message', '<strong>Saving</strong> Profile Data.');
    }, 3000);

    setTimeout(function() {
        notify.update('message', '<strong>Checking</strong> for errors.');
    }, 4000);
</script>

@section('content')


<div class="col-md-10">

    <iframe id="video-background" width="700" height="600" src="https://www.youtube.com/embed/@if($video != null){{$video->url}}@endif?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;html5=1&amp;allowfullscreen=true&amp;wmode=transparent" frameborder="0" allowfullscreen></iframe>

</div>

<div class="col-md-2">
    <br>
    Siguiente video
    <br>
    <hr>
    Otro video
    <br>
    <hr>
</div>
@if ($next != null)
    <!--
<div class="media .media-left" id="footer">
    <div class="media-left">
        <a href="#">
            <img src="{{$next->snippet->thumbnails->default->url}}">
        </a>
    </div>
    <div class="media-body">
        <br>
        <h1 class="media-heading"> {{$next->snippet->title}}</h1>
    </div>
</div>

<div class="media .media-left" id="footer2">
    <div class="media-left">
        <a href="#">
            <img src="{{$next->snippet->thumbnails->default->url}}">
        </a>
    </div>
    <div class="media-body">
        <br>
        <h1 class="media-heading"> {{$next->snippet->title}}</h1>
    </div>
</div>-->

@endif
@endsection

<style>
    body {
        color: #ffffff !important;
        background: #000000  !important;
    }

    #video-background {
        height: 100%;
        position: fixed;
        width: 82%;
        z-index: -100;
    }

    #footer {
        width: 40%;
        height: 11%;
        position: absolute;
        bottom: 0;
        left: 5%;
    }
    #footer2{
        width: 40%;
        height: 11%;
        position: absolute;
        bottom: 0;
        right: 18%;
    }

</style>

@extends('simple')

@section('content')
    <a href="{{ url('/channels') }}">Canales</a>
    <iframe id="video-background" width="700" height="600" src="https://www.youtube.com/embed/@if($video != null){{$video->url}}@endif?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;html5=1&amp;allowfullscreen=true&amp;wmode=transparent" frameborder="0" allowfullscreen></iframe>

@endsection

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
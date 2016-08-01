@if(isset($videos))
    <ul class="list-group">
        @foreach($videos as $video)

            <li class="list-group-item">
                <img src="{{$video->thumbnail}}">
                <h3>{{$video->title}}</h3>
            </li>
        @endforeach
    </ul>
@endif
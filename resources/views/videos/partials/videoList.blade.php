@if(count($videos) > 0)

        @foreach($videos as $video)

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{$video->thumbnail}}">
                        <div class="caption">
                            <h3>{{$video->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
@else
    <p class="alert alert-info">Actualmente este canal no posee videos. Por favor agrega nuevos.</p>
@endif
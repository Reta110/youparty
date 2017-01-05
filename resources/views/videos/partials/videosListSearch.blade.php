@if(isset($videos))
    @foreach($videos as $video)
        <div class="col-md-6 table-bordered">
                <img src="{{$video->snippet->thumbnails->medium->url}}" class="center-block">
                <div class="caption">
                    <h3 class="text-center">{{$video->snippet->title}}</h3>

                    {!! Form::open(['route' => ['save.video',$channel], 'method' => 'POST', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        <input type="hidden" name="videoId" value="{{$video->id->videoId}}" />
                        <input type="hidden" name="title" value="{{$video->snippet->title}}" />
                        <input type="hidden" name="thumbnail" value="{{$video->snippet->thumbnails->medium->url}}" />
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o" aria-hidden="true"></i>   Agregar video al canal</button>
                    </p>

                    {!! Form::close() !!}
                </div>

        </div>
    @endforeach
@endif
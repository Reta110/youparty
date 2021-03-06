@if(isset($videos))
    @if(is_array($videos))
    @foreach($videos as $video)
        @if(isset($video->id->videoId) && isset($video->snippet->title) && isset($video->snippet->thumbnails->medium->url) )
        <div class="col-sm-6 col-md-4" style="min-height: 55vh">
            <div class="thumbnail">
                <img src="{{$video->snippet->thumbnails->medium->url}}" class="center-block image-responsive">
                <div class="caption">
                    <h3 class="text-center">{{str_limit($video->snippet->title, 60)}}</h3>

                    {!! Form::open(['route' => ['save.video',$channel], 'method' => 'POST', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        <input type="hidden" name="videoId" value="{{$video->id->videoId}}"/>
                        <input type="hidden" name="title" value="{{$video->snippet->title}}"/>
                        <input type="hidden" name="thumbnail" value="{{$video->snippet->thumbnails->medium->url}}"/>
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o"
                                                                                aria-hidden="true"></i> Agregar
                            video al canal
                        </button>
                    </p>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endif
    @endforeach
    @else
        <p class="alert bg-danger">No se encontraron videos.</p>
    @endif
@endif

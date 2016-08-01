@if(isset($videos))
    @foreach($videos as $video)
        <div class="col-sm-5 col-md-5">
            <div class="thumbnail">
                <img src="{{$video->snippet->thumbnails->medium->url}}">
                <div class="caption">
                    <h3>{{$video->snippet->title}}</h3>

                    {!! Form::open(['route' => ['save.video',$channel], 'method' => 'POST', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        <input type="hidden" name="videoId" value="{{$video->id->videoId}}" />
                        <input type="hidden" name="title" value="{{$video->snippet->title}}" />
                        <input type="hidden" name="thumbnail" value="{{$video->snippet->thumbnails->medium->url}}" />
                    </div>
                    <p class="pull-right">
                        <button type="submit" class="btn btn-success btn-sm glyphicon glyphicon-ok ">Agregar video al canal</button>
                    </p>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach
@endif
@if(count($videos) > 0)

    <h4>Lista de videos agregados:</h4>

        @foreach($videos as $video)

            <div class="col-sm-6 col-md-4"  style="min-height: 55vh">
                    <div class="thumbnail">
                        <img src="{{$video->thumbnail}}" class="center-block image-responsive">
                        <div class="caption">
                            <h3 class="text-center">{{$video->title}}</h3>
{{--
                            {!! Form::open(['route' => ['save.video',$channel], 'method' => 'POST', 'class' => 'form-inline']) !!}

                            <p class="text-center">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-check-circle-o"
                                                                                        aria-hidden="true"></i> Eliminar de la lista
                                </button>
                            </p>

                            {!! Form::close() !!}
                            --}}
                        </div>
                    </div>
            </div>
        @endforeach
@else
    <p class="alert alert-info">Actualmente este canal no posee videos. Por favor agrega nuevos.</p>
@endif
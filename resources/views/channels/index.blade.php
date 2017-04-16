@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(count($channels)>0)
                    <h1>Elige un canal</h1>
                @else
                    <h1>Uupss..</h1>
                    <p class="alert-danger">En estos momentos no existe ningun canal. Si deseas crear uno dirigete al <a
                                href="{{ url('/admin') }}"><i class="fa fa-btn fa fa-cogs"></i>Admin</a></p>
                @endif

                <div class="panel panel-default panel-info">

                    <div class="panel-heading">

                        <div class="fb-share-button center-block" data-href="http://youparty.com.ve/"
                             data-layout="button_count"></div>

                    </div>

                    <div class="panel-body">
                        @if (Auth::guest())
                            <div class="alert alert-warning">
                                <p>Inicia sesion para poder entrar a un canal.</p>
                            </div>
                        @endif
                        @foreach($channels as $channel)
                            <div class="col-md-6 table-bordered">
                                <a href="channel/{{$channel->id}}">
                                    <img src="{{url('images/channels/'.$channel->id.'.jpg')}}"
                                         class="img-responsive center-block">
                                </a>
                                <a href="channel/{{$channel->id}}"><h4 class="text-center">{{$channel->name}} </h4></a>
                                <hr>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            {{ $channels->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


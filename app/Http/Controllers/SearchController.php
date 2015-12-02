<?php namespace you\Http\Controllers;

use Illuminate\Support\Facades\Input;
use you\ChannelVideos;
use you\Http\Requests;
use you\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $videos = "";
        $channel_id = $request->segment(2);

        return view('youparty.search', compact('videos', 'channel_id'));
    }


    /**
     * Muestra los resultados con el botón para agregar los videos al canal.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $word = Input::get('search');
        $channel_id = Input::get('channel_id');

        $youtube = new \Madcoda\Youtube(array('key' => 'AIzaSyC4DkOm379a_5p77mjjLlEsBubtPXYO584'));
        // Set Default Parameters
        $params = array(
            'q' => $word,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 20    //Numero de resultados
        );

        // Make Intial Call. With second argument to reveal page info such as page tokens.
        $search = $youtube->searchAdvanced($params, true);

        // check if we have a pageToken
        if (isset($search['info']['nextPageToken'])) {
            $params['pageToken'] = $search['info']['nextPageToken'];
        }

        // Make Another Call and Repeat
        $videos = $youtube->searchAdvanced($params, true);

        return view('youparty.search', compact('videos', 'channel_id'));
    }

    /**
     * Guarda el video seleccionado a la lista del canal.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveVideo(Request $request)
    {
        $channel_id = Input::get('channel_id');
        $video = new ChannelVideos();
        $video->url = Input::get('url');
        $video->channel_id = $channel_id;
        $video->save();

        return redirect('channel/'.$channel_id);
    }

}


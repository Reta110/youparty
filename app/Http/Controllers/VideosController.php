<?php

namespace App\Http\Controllers;

use Gate;
use App\Channel;
use App\Video;
use Illuminate\Http\Request;
use Madcoda\Youtube\Youtube;

class VideosController extends Controller
{

    /**
     * Search videos.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function searchVideos(Request $request, $id)
    {
        $word = $request->word;
        $channel = Channel::findOrfail($id);

        $params = $this->params($word);
        $youtube = new Youtube(config('youtube'));

        $videos = $youtube->searchAdvanced($params, true);
        $videos = $videos['results'];

        return view('videos.list', compact('videos', 'channel'));
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveVideo(Request $request, $id)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->videoId = $request->videoId;
        $video->thumbnail = $request->thumbnail;
        $video->channel_id = $id;
        $video->viewed = 0;
        $video->user_id = auth()->user()->id;
        $video->save();

        return redirect("channel/$id")->with('success', 'Tu video ha sido agregado.');
    }


    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videoList($id)
    {
        $channel = Channel::findOrFail($id);
        $videos = Video::where('channel_id', $id)->where('viewed', 'false')->get();

        return view('videos.list', compact('videos', 'channel'));
    }


    /**
     * @return array
     */
    public function params($word)
    {
        return [
            'q' => $word,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 20,
        ];
    }

    public function destroy(Video $video)
    {
        $this->authorize('owner', $video);

        $channel = $video->channel->id;

        Video::destroy($video->id);

        return redirect()->to("channel/$channel")->with('success', 'El video ha sido eliminado.');
    }
}

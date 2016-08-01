<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Video;
use Illuminate\Http\Request;
use Madcoda\Youtube;

class VideosController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function searchVideos(Request $request, $id)
    {
        $word    = $request->word;
        $channel = Channel::findOrfail($id);

        $params = [
            'q'          => $word,
            'type'       => 'video',
            'part'       => 'id, snippet',
            'maxResults' => 20,
        ];

        $youtube = new Youtube(config('youtube'));

        // Make a call
        $videos = $youtube->searchAdvanced($params, true);

        // check if we have a pageToken
        if (isset( $search['info']['nextPageToken'] )) {
            $params['pageToken'] = $search['info']['nextPageToken'];
        }

        $videos = $videos['results'];

        return view('videos.list', compact('videos', 'channel'));
    }


    public function saveVideo(Request $request, $id)
    {
        $video             = new Video();
        $video->title      = $request->title;
        $video->videoId    = $request->videoId;
        $video->thumbnail  = $request->thumbnail;
        $video->channel_id = $id;
        $video->save();

        redirect()->route('search.videos', $id);
    }


    public function videoList($id)
    {
        $channel = Channel::findOrFail($id);
        $videos  = Video::where('channel_id', $id)->where('viewed', 'false')->get();

        return view('videos.list', compact('videos', 'channel'));
    }
}

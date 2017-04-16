<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Video;
use Madcoda\Youtube\Youtube;

class YoupartyController extends Controller
{

    /**
     * Show youparty -  all the videos of the channel
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $user = auth()->user();
        $channel = Channel::findOrFail($id);

        $this->authorize('isOwnerOfChannel', $channel);

        $youtube = new Youtube(config('youtube'));

        $video = $this->getFirstNoRepeatedVideo($id);

        if ($video != null) {
            $info = $youtube->getVideoInfo($video->videoId);
            $time = $this->timeCalculate($info->contentDetails->duration);

            $this->viewedUpdate($video->id);
        }

        return view("youparty.show", compact('video', 'time'));
    }


    /**
     * Update - video Now is viewed
     *
     * @param $id
     */
    public function viewedUpdate($id)
    {
        $video = Video::findOrFail($id);
        $video->viewed = 1;
        $video->update();
    }


    /**
     * Time calculate -  youtube format-> milisegundos
     *
     * @param $time
     *
     * @return array|string
     */
    public function timeCalculate($time)
    {
        if (strstr($time, "M")) {

            $time = trim($time, 'PT');
            $time = trim($time, 'S');
            $time = explode('M', $time);
            $time = ((($time[0] * 60) + ($time[1])) * 1000);
        } else {
            $time = trim($time, 'PT');
            $time = explode('S', $time);
            $time = ($time[0] * 1000);
        }

        return $time + 3000;
    }

    /**
     * @param $id
     * @return mixed
     */
    private function getFirstNoRepeatedVideo($id)
    {
        $video = null;
        //First viewed video
        $videoViewed = Video::where('channel_id', $id)->Where('viewed', 1)->orderBy('id', 'DES')->first();

        // Get the first without repeat the user_id of the last viewed
        if ($videoViewed != null) {
            $video = Video::where('channel_id', $id)->Where('viewed', 0)->Where('user_id', '<>', $videoViewed->user_id)->first();
        }

        //Else get the the next one.
        if ($video == null) {
            $video = Video::where('channel_id', $id)->Where('viewed', 0)->first();
        }

        return $video;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Madcoda\Youtube;
use App\Video;

class YoupartyController extends Controller
{
    public function index($id)
    {
        $youtube = new Youtube(config('youtube'));

        $video = Video::where('channel_id', $id)
            ->Where('viewed', '=', 0)
            ->first();

        if ($video != null) {
            $info = $youtube->getVideoInfo($video->videoId);
            $time = $this->timeCalculate($info->contentDetails->duration);

            //$this->viewedUpdate($video->id);
        }

        return view("youparty.show", compact('video', 'time'));
    }

    /**
     * Marcar que ha sido visto el video
     * @param $id
     */
    public function viewedUpdate($id)
    {
        $video = Video::findOrFail($id);
        $video->viewed = 1;
        $video->update();
    }

    /**
     * Calcula el tiempo - formato youtube -> milisegundos
     * @param $time
     * @return array|string
     */
    public function timeCalculate($time)
    {
        if (strstr($time,"M")){

            $time = trim($time, 'PT');
            $time = trim($time, 'S');
            $time = explode('M', $time);
            $time = ((($time[0] * 60) + ($time[1])) * 1000);
        }
        else
        {
            $time = trim($time, 'PT');
            $time = explode('S', $time);
            $time = ($time[0] * 1000);
        }

        return $time;
    }
}

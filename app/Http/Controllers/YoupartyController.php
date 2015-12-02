<?php namespace you\Http\Controllers;

use you\ChannelVideos;
use you\Http\Requests;

class YoupartyController extends Controller
{

    /**
     * Muestra los videos del canal seleccionado
     * @param $id
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $youtube = new \Madcoda\Youtube(array('key' => 'AIzaSyC4DkOm379a_5p77mjjLlEsBubtPXYO584'));
        $video = ChannelVideos::where('channel_id', '=', $id)
                    ->Where('viewed', '=', 0)
                    ->first();

        if ($video != null) {
            $info = $youtube->getVideoInfo($video->url);

            $time = $this->timeCalculate($info->contentDetails->duration);
            $this->viewedUpdate($video->id);
        }

        return view("youparty.show", compact('video', 'time'));
    }

    /**
     * Marcar que ha sido visto el video
     * @param $id
     */
    public function viewedUpdate($id)
    {
        $video = ChannelVideos::findOrFail($id);
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
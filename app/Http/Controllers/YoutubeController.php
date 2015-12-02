<?php namespace you\Http\Controllers;

use you\Http\Requests;
use you\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $youtube = new \Madcoda\Youtube(array('key' => 'AIzaSyC4DkOm379a_5p77mjjLlEsBubtPXYO584'));
        $videoId = $youtube->parseVIdFromURL('https://www.youtube.com/watch?v=OsjdYQJc748&list=PLPKuYmN_zBQnhH3CNtt3ESwlDP7gWb7WU&index=1');

        dd($youtube->getVideoInfo($videoId));
    }
}
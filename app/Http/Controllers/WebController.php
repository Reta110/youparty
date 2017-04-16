<?php

namespace App\Http\Controllers;

use composerIlluminate\Http\Request;
use App\Channel;

class WebController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::orderBy("id", "DES")->paginate();
        return view('web.home', compact('channels'));
    }

    public function instructions()
    {
        return view('web.instructions');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::orderBy("id", "DES")->paginate();
        return view('welcome', compact('channels'));
    }
}

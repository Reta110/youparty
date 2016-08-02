<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $channels = Channel::Where('user_id', $user->id)->get();

        return view('admin.admin', compact('channels'));
    }
}

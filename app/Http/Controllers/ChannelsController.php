<?php namespace you\Http\Controllers;

use you\Channel;
use you\Http\Requests;
use you\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ChannelsController extends Controller {


    /**
     * @return \Illuminate\View\View
     */
    public function index()
	{
		$channels = Channel::all();
        return view('channels.index', compact('channels'));
	}


    /**
     * @return \Illuminate\View\View
     */
    public function create()
	{
		return view('channels.create');
	}


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
	{
		Channel::create($request->all());
        return redirect()->route('channels');
	}

    /**
     * @param $id
     */
    public function destroy($id)
	{
		//Channel::deleted($id);
	}

}

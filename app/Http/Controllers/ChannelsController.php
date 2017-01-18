<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{

    /**
     * Display a listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::paginate();
        return view('channels.index', compact('channels'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|image'
        ]);

        $channel = new Channel();

        $channel->name = $request->name;
        $channel->user_id = $user->id;
        $channel->save();

        $imageName = $channel->id . '.' .
            $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            public_path() . '/images/channels/', $imageName
        );

        return redirect()->route('admin.index')->with('success', 'El canal ha sido creado correctamente.');;
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $channel = Channel::findOrfail($id);
        $videos = Channel::find($id)->videos()->where('viewed', 0)->get();

        return view('videos.search', compact(['channel', 'videos']));
    }

    public function destroy(Channel $channel)
    {
        $this->authorize('accept', $channel);

        Channel::destroy($channel->id);

        return view('channels.index')->with('success', 'El canal ha sido eliminado.');
    }
}

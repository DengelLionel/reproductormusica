<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaylistRequest;
use App\Models\Playlist_song;
use App\Models\Playlists;
use App\Models\Songs;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlistSongs=Playlist_song::join('playlists','playlist_songs.id','=','playlists.id')
        ->join('songs','playlist_songs.id','=','songs.id')
        ->select('playlists.name','songs.path','songs.title','playlists.id','playlist_songs.id as playsong')->get();
        $playlist=Playlists::all();
        $songs=Songs::all();
       return view('playlist.index',compact('playlist','songs','playlistSongs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request)
    {
        $datosgeneral=$request->all();
        Playlists::create($datosgeneral);
        return redirect()->route('playlist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function show(Playlists $playlists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlists $playlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlists $playlists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlists $playlist)
    {
       $playlist->delete();
       return redirect()->route('playlist.index');
    }
}

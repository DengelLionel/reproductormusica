<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaylistSongRequest;
use App\Models\Playlist_song;
use Illuminate\Http\Request;

class PlaylistSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(PlaylistSongRequest $request)
    {
        $datosGenerales=$request->all();
        Playlist_song::create($datosGenerales);
        return redirect()->route('playlist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist_song  $playlist_song
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist_song $playlist_song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist_song  $playlist_song
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist_song $playlist_song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist_song  $playlist_song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist_song $playlist_song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist_song  $playlist_song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist_song $playlistsong)
    {
      
            $playlistsong->delete();
            
     
        return redirect()->route('playlist.index');
    }
  
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongsRequest;
use App\Models\Albums;
use App\Models\Artists;
use App\Models\Interactions;
use App\Models\Playlist_song;
use App\Models\Songs;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancion=Songs::join('albums','songs.album_id','=','albums.id')
            ->join('artists','songs.artist_id','=','artists.id')
            ->join('playlist_songs','songs.id','=','playlist_songs.song_id')
            ->join('playlists','playlist_songs.playlist_id','=','playlists.id')
            ->join('interactions','songs.id','=','interactions.song_id')
                ->select('albums.name as namealbum','albums.cover','artists.name as nameartist','songs.path','songs.id as songid','playlists.name as playlistname',Artists::raw('SUM(interactions.play_count) as playc'))->groupBy('songs.id','playlists.id');
            $canciones=$cancion->get();  
        $album=Albums::all();
        $artist=Artists::all();
        $interaction=Interactions::all();
       return view('canciones.index',compact('album','artist','canciones','interaction'));
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
    public function store(SongsRequest $request)
    {
        $datosGenerales=$request->all();
        if($audioCancion=$request->file('path')){
            $rutaCancion='path/';
            $CancionText=date('YmdHis').'.'.$audioCancion->getClientOriginalExtension();
            $audioCancion->move($rutaCancion,$CancionText);
            $datosGenerales['path']="$CancionText";
           }
           $datosModify=$request->only(['length']);
           $datosGenerales['length']=floatval($datosModify['length']);
           Songs::create($datosGenerales);
            return redirect()->route('canciones.index')->with(["status"=>"success","color"=>"green","message"=>"Se creó la canción exitosamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function show(Songs $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function edit(Songs $songs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Songs $songs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Songs $cancione)
    {
        $cancion=Songs::join('albums','songs.album_id','=','albums.id')
        ->join('artists','songs.artist_id','=','artists.id')
        ->join('playlist_songs','songs.id','=','playlist_songs.song_id')
        ->join('playlists','playlist_songs.playlist_id','=','playlists.id')
        ->join('interactions','songs.id','=','interactions.song_id')
            ->select('albums.name as namealbum','albums.cover','artists.name as nameartist','songs.path','songs.id as songid','playlists.name as playlistname',Artists::raw('SUM(interactions.play_count) as playc'))->groupBy('songs.id','playlists.id');
        $canciones=$cancion->get();
        if($canciones->songid!==$cancione){
            $cancione->delete();
        }
       
    }
}



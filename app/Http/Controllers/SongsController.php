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
        $canciones=Songs::join('albums','songs.album_id','=','albums.id')
            ->join('artists','songs.artist_id','=','artists.id')
            ->join('playlist_songs','songs.id','=','playlist_songs.song_id')
            ->join('playlists','playlist_songs.playlist_id','=','playlists.id')
            
                ->select('albums.name as namealbum','albums.cover','artists.name as nameartist','songs.path','songs.id as songid','songs.title as songname','playlists.name as playlistname')->groupBy('songs.id','playlists.id')->get();
               /*  ,Interactions::raw('SUM(interactions.play_count) as playc') */
        $album=Albums::all();
        $artist=Artists::all();
        $interaction=Interactions::all();
      $songsList=Songs::all();
       return view('canciones.index',compact('album','artist','canciones','interaction','songsList'));
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
    public function edit(Songs $cancione)
    {
        $album=Albums::all();
        $artist=Artists::all();
        return view('canciones.edit',compact('cancione','album','artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function update(SongsRequest $request, Songs $cancione)
    {
        $cancione->fill($request->validated());
        if($audioCancion=$request->file('path')){
            $rutaCancion='path/';
            $CancionText=date('YmdHis').'.'.$audioCancion->getClientOriginalExtension();
            $audioCancion->move($rutaCancion,$CancionText);
            $datosGenerales['path']="$CancionText";
           }
           $datosModify=$request->only(['length']);
           $cancione['length']=floatval($datosModify['length']);
          $cancione->save();
           return redirect()->route('canciones.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Songs $cancione)
    {
            $cancione->delete();
       
       return redirect()->route('canciones.index');
    }
}



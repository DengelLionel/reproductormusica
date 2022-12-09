<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongsRequest;
use App\Models\Albums;
use App\Models\Artists;
use App\Models\Interactions;
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
        $canciones=Songs::join('albums','songs.id','=','albums.id')
            ->join('artists','songs.id','=','artists.id')
            /* ->join('playlist_songs','songs.id','=','playlist_songs.id')
            ->join('playlists','playlist_songs.playlist_id','=','playlists.id') */
            ->join('interactions','songs.id','=','interactions.song_id')
                ->select('albums.name as namealbum','albums.cover','artists.name as nameartist','songs.path','songs.id as songid')->get();
              /*   ,'playlists.name as playname','interactions.liked as like','interactions.play_count as count','interactions.song_id as interid' */
          /*   $collection=collect($canciones); */

          /*  $mapeado=$collection->map(function ($i){
            $datos=[];
            $likeTotal=0;
            $totalGeneralLike=0;
            $countTotal=0;
            $totalGeneralCount=0;
          
          
            $totalGeneralLike=$likeTotal+=$i->like;
            $totalGeneralCount=$countTotal+=$i->count;
            
            $datos[]=[
                "namealbum"=>$i->namealbum,
                "artist_id"=>$i->artist_id,
                "album_id"=>$i->album_id,
                "cover"=>$i->cover,
                "nameartist"=>$i->nameartist,
                "path"=>$i->path,
                "songid"=>$i->songid,
                "playname"=>$i->playname,
                "like"=>$i->songid==$i->interid?$totalGeneralLike+=$i->like:"hola", 
                 "count"=>$i->songid==$i->interid?$totalGeneralCount+=$i->count:"hola" 

            ];
            return $datos;
           }); */
                /* dd($mapeado); */
           
            
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
    public function destroy(Songs $songs)
    {
        //
    }
}



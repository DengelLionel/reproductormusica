<?php

namespace App\Http\Controllers;

use App\Models\Artists;
use Illuminate\Http\Request;
use App\Http\Requests\artistaRequest;
class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists=Artists::all();
       return view('artista.index',compact('artists'));
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
    public function store(artistaRequest $request)
    {
       $datosArtista=$request->all();
       if($imageArtista=$request->file('image')){
        $rutaImagen='image/';
        $imageText=date('YmdHis').'.'.$imageArtista->getClientOriginalExtension();
        $imageArtista->move($rutaImagen,$imageText);
        $datosArtista['image']="$imageText";
       }
       Artists::create($datosArtista);
        return redirect()->route('artista.index')->with(["status"=>"success","color"=>"green","message"=>"Se creó el arista exitosamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artists  $artists
     * @return \Illuminate\Http\Response
     */
    public function show(Artists $artists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artists  $artists
     * @return \Illuminate\Http\Response
     */
    public function edit(Artists $artistum)
    {
        return view('artista.edit',compact('artistum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artists  $artists
     * @return \Illuminate\Http\Response
     */
    public function update(artistaRequest $request, Artists $artistum)
    {
        $artistum->fill($request->validated());
        
        if($imageArtista=$request->file('image')){
            $rutaImagen='image/';
            $imageText=date('YmdHis').'.'.$imageArtista->getClientOriginalExtension();
            $imageArtista->move($rutaImagen,$imageText);
            $artistum['image']="$imageText";
           }
           $artistum->save();
        return redirect()->route('artista.index')->with(["statuupdate"=>"success","message"=>"Artista actualizado o modificado con exito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artists  $artists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artists $artistum)
    {
        $artistum->delete();
        return redirect()->route('artista.index');
    }
}

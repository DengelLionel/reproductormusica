<?php

namespace App\Http\Controllers;

use App\Http\Requests\generoRequest;
use App\Models\Albums;
use App\Models\Artists;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos=Albums::all();
        $artista=Artists::select('id','name')->get();
       return view('genero.index',compact('artista','generos'));
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
    public function store(generoRequest $request)
    {
      $datosGenero=$request->all();
      if($imageGenero=$request->file('cover')){
        $rutaImagen='cover/';
        $imageText=date('YmdHis').'.'.$imageGenero->getClientOriginalExtension();
        $imageGenero->move($rutaImagen,$imageText);
        $datosGenero['cover']="$imageText";
       }
       Albums::create($datosGenero);
       return redirect()->route('genero.index')->with(["status"=>"success","color"=>"green","message"=>"Se creó el género exitosamente"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function show(Albums $albums)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function edit(Albums $genero)
    {
        $artista=Artists::select('id','name')->get();
        return view('genero.edit',compact('genero','artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function update(generoRequest $request, Albums $genero)
    {
       $genero->fill($request->validated());
       if($imageGenero=$request->file('cover')){
        $rutaImagen='cover/';
        $imageText=date('YmdHis').'.'.$imageGenero->getClientOriginalExtension();
        $imageGenero->move($rutaImagen,$imageText);
        $genero['cover']="$imageText";
       }
       $genero->save();
       return redirect()->route('genero.index')->with(["statuupdate"=>"success","message"=>"Genero actualizado o modificado con exito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Albums  $albums
     * @return \Illuminate\Http\Response
     */
    public function destroy(Albums $genero)
    {
    $genero->delete();
    return redirect()->route('genero.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\InteractionRequest;
use App\Models\Interactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InteractionsController extends Controller
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
    public function store(Request $request)
    {
        $interaction= new Interactions();
        $interaction->user_id=intval($request->user_id);
        $interaction->song_id=intval($request->song_id);
        $interaction->liked=true;
        $interaction->play_count=intval($request->play_count);
        $interaction->save();
       

        
        return redirect()->route('playlist.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function show(Interactions $interactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Interactions $interactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interactions $interactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interactions  $interactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interactions $interactions)
    {
        //
    }
}

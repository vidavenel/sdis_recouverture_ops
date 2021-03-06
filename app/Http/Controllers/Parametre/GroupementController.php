<?php

namespace App\Http\Controllers\Parametre;

use App\Http\Controllers\Controller;
use App\Models\Groupement;
use Illuminate\Http\Request;

class GroupementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.parametre.groupement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.parametre.groupement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groupement  $groupement
     * @return \Illuminate\Http\Response
     */
    public function show(Groupement $groupement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groupement  $groupement
     * @return \Illuminate\Http\Response
     */
    public function edit(Groupement $groupement)
    {
        return view('pages.parametre.groupement.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groupement  $groupement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groupement $groupement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groupement  $groupement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groupement $groupement)
    {
        //
    }
}

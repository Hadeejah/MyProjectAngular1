<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use Illuminate\Http\Request;

class CaracteristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            "libelle" => "required",
        ]);
        $caracLib=Caracteristique::create([
            "libelle"=>$request->libelle
        ]);
        return response()->json([
            "succes"=>"true",
            "data"=>$caracLib,
            "message"=>"Caracteristique créé avec succés",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caracteristique $caracteristique)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Succursale;
use Illuminate\Http\Request;

class SuccursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Succursale::all();
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
            "nom" => "required",
            "adresse" => "required",
            // "reduction" => "required",
            "telephone" => "required",

        ]);
        $user = Succursale::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
        ]);
        return response()->json([
            'sucess' => true,
            'data' => $user,
            'message' => "Utilisateur créé avec succés",
        ]);
    }
    public function editSucc(Request $request, $id_Succur)
    {
        $newSucc = [
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
        ];
        $succ = Succursale::find($id_Succur);
        if (!$succ) {
            return response()->json([
                "success" => "true",
                "data" => [],
                "message" => "Succursale existe pas",
            ]);
        }
        $succ->update($newSucc);
        $succ->save();
        return response()->json([
            "success" => "true",
            "data" => $succ,
            "message" => "Succursale modifié",
        ]);
    }
    public function deleteSuccur(Request $request, $id_Succur)
    {
        $delSucc = Succursale::find($id_Succur);
        if ($delSucc) {
            $delSucc->delete();
            return response()->json([
                "message" => "Succursale supprimé avec succés",
            ]);
        }
        return response()->json([
            "message" => "Succursale n'existe pas",
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Succursale $succursale)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Succursale $succursale)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Succursale $succursale)
    {


        // $succ->update($newSucc);
        // $succ->save();
        // return response()->json([
        //     "success" => "true",
        //     "data" => $succ,
        //     "message" => "Succursale modifié!",
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Succursale $succursale)
    {
        //
    }
}

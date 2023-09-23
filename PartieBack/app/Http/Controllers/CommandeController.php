<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Paiement;
use App\Models\ProdSuccur;
use Illuminate\Http\Request;

class CommandeController extends Controller
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

        $prodSuccurId=ProdSuccur::where(['succursale_id'=>$request->succursale_id,'produit_id'=>$request->produit_id])->first();

        $commande = Commande::create([
            'date' => now(),
            'reduction' => $request->reduction,
            'mntTotalCommande' => $request->mntTotalCommande,
            'utilisateur_id' => $request->utilisateur_id,
            'client_id' => $request->client_id,
        ]);
          
        $commande->produitSuccursales()->attach($prodSuccurId->id,[$request->prod_succurs]);
         $qteStock=ProdSuccur::find(id);
        return response()->json([
            "succes" => "true",
            "data" => $commande,
            "message" => "Commande...",
        ]);
        // $commande->produitSuccursales()->attach($request->prod_succurs_id);
        // $paie = Paiement::create([
        //     "date_paiement" => now(),
        //     "montant_payer" => $request->montant_payer,
        //     "commande_id" => $commande->id

        // ]);
        // $commande->paiement()->attach($paie);
        // $commande->produits()->attach($produit_id,["prix"=>$prix,"qte"=>$qte]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}

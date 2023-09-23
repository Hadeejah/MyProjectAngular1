<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Resources\ProduitResource;
use App\Models\Ami;
use App\Models\Succursale;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller

{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProduitResource::collection(Produit::all());
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
            'libelle' => "required|unique:produits",
            'code' => "required|unique:produits",
            'description' => "required|unique:produits",
            // 'image'=> "required"
        ]);
        $prod = Produit::create([
            'libelle' => $request->libelle,
            'code' => $request->code,
            'description' => $request->description,
            'image' => $request->file('image')->store('public') ?? null
        ]);
        $succur_id = $request->succur_id;
        $prixProd = $request->prixProd;
        $prix_en_gros = $request->prix_en_gros;
        $qteStock = $request->qteStock;

        $caracteristique_id = $request->caracteristique_id;
        $unite_id = $request->unite_id;
        $valeur = $request->valeur;
        $prod->succursales()->attach($succur_id, ["prixProd" => $prixProd, "prix_en_gros" => $prix_en_gros, "qteStock" => $qteStock]);
        $prod->caracteristiques()->attach($caracteristique_id, ["unite_id" => $unite_id, "valeur" => $valeur]);

        return $this->formatResponse("true", $prod, "Produit créé");
    }

    /**
     * Display the specified resource.
     */
    public function search(string $id, string $code)
    {
        $searchProd = Produit::where("code", $code)->first();
        if (!$searchProd) {
            return $this->formatResponse("true", [], "Code invalide");
        }
        $prod=Produit::where('code',$code)->with(['succursales'=>function($query) use ($id){
            $query->where('succursale_id',$id);
        }])->first();
        return  ProduitResource::make($prod);

        $produits = DB::table('prod_succurs')->where(['succursale_id' => $id, 'produit_id' => $searchProd->id])->where('qteStock', '>', 0)->first();
         
        return $produits;
        // return $this->formatResponse("true",$produits,"Produit ....");
        // if ($produits) {
        //     return Succursale::myFriends($id);
        // }
    }
    // dd($code);
              

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}

<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Paiement;
use App\Models\ProdSuccur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ];
    // public function produits()
    // {
    //     return $this->belongsToMany(Produit::class,'prod_commandes');
    // }



    public function produitSuccursales():BelongsToMany{
        return $this->belongsToMany(ProdSuccur::class,'prod_commandes');
    }

    public function paiement():HasMany
    {
        return $this->hasMany(Paiement::class);
    }
}

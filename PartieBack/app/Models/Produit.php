<?php

namespace App\Models;

use App\Models\Commande;
use App\Models\Succursale;
use App\Models\Caracteristique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'code',
        'description',
        'image'
    ];
    public function caracteristiques()
    {
        return $this->belongsToMany(Caracteristique::class, 'caracteris_produits')->withPivot(["valeur"]);
    }
    public function succursales()
    {
        return $this->belongsToMany(Succursale::class, 'prod_succurs')->withPivot(["prixProd", "qteStock", "prix_en_gros"]);
    }
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'prod_commandes');
    }
}

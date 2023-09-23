<?php

namespace App\Models;

use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProdCommande extends Model
{
    use HasFactory;
    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class, 'prod_commandes');
    }
}

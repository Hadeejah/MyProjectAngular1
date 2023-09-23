<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    use HasFactory;
    protected $guarded=[
        'id',
    ];
    public function produits()
    {
        return $this->belongsToMany(Produits::class,'CaracterisProduit');
    }
}

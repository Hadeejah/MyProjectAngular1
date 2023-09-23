<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Succursale extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'nom',
        'telephone',
        'adresse',
    ];
    protected $guarded = [
        'id'
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'prod_succurs');
    }

    // public function amis(): BelongsToMany
    // {
    //     return $this->belongsToMany(Succursale::class, 'amis', "from", "to")->withPivot('accepted');
    // }
    public function scopeMyFriends(Builder $build, $id)
    {
        return $build->from('amis')->where('accepted', 1)
            ->where('from', $id)
            ->orWhere('to', $id)
            ->get();
    }
}

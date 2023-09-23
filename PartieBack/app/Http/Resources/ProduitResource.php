<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "libelle"=>$this->libelle,
            "code"=>$this->code,
            "description"=>$this->description,
            "image"=>$this->image,
            "succursale"=>SuccursaleResource::collection($this->succursales),
            "caracteristiques"=>CaracteristiqueResource::collection($this->caracteristiques)
        ];
    }
}

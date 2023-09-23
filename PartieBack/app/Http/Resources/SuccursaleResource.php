<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // "telephone" => $this->telephone,
            // "adresse" => $this->adresse,
            "id" => $this->id,
            "nom" => $this->nom,
            "reduction" => $this->reduction,
            "prixProd"=>$this->pivot->prixProd,
            "qteStock"=>$this->pivot->qteStock,
            "prix_en_gros"=>$this->pivot->prix_en_gros
        ];
    }
}

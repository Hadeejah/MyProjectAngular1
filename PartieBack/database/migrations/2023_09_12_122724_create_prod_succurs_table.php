<?php

use App\Models\Produit;
use App\Models\Succursale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prod_succurs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Succursale::class)->constrained();
            $table->foreignIdFor(Produit::class)->constrained();
            $table->integer('prixProd');
            $table->integer('prix_en_gros');
            $table->integer('qteStock');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_succurs');
    }
};

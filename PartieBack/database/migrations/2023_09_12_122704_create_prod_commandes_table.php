<?php

use App\Models\Commande;
use App\Models\ProdSuccur;
use App\Models\Produit;
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
        Schema::create('prod_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Commande::class)->constrained();
            $table->foreignIdFor(ProdSuccur::class)->constrained();
            $table->integer('prix');
            $table->integer('qte');
            $table->integer('reduction')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_commandes');
    }
};

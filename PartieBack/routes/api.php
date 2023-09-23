<?php

use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SuccursaleController;
use App\Http\Controllers\UtilisateurController;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* Crud Succursale */

Route::post('/succurs', [SuccursaleController::class, 'store']);
Route::get('/succurs', [SuccursaleController::class, 'index']);
Route::put('/succurs/{id_Succur}', [SuccursaleController::class, 'editSucc']);
Route::delete('/succurs/{id_Succur}', [SuccursaleController::class, 'deleteSuccur']);

/* Crud Produit */
Route::post('/produit', [ProduitController::class, 'store']);
Route::get('/produit', [ProduitController::class, 'index']);
Route::put('/produit/{id_Prod}', [ProduitController::class, 'editProd']);
Route::delete('/produit/{id_Prod}', [ProduitController::class, 'deleteProd']);
Route::get('/succursales/{id}/search/{code}', [ProduitController::class,'search']);

/* Caracteristique */
Route::post('/caracteristique', [CaracteristiqueController::class,'store']);

/* Commande */
Route::post('/commande', [CommandeController::class,'store']);


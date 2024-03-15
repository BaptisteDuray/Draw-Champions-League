<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TirageController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ChapeauController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route pour vérifier l'état de l'API
Route::get('/', function () {
    info('API route reached');
    return response()->json(['message' => 'API is running']);
});

// Routes pour gérer les clubs
Route::get('/clubs', [ClubController::class, 'index']);
Route::get('/clubs/{id}', [ClubController::class, 'show']);
Route::post('/clubs', [ClubController::class, 'create']);
Route::put('/clubs/{id}', [ClubController::class, 'update']);
Route::delete('/clubs/{id}', [ClubController::class, 'delete']);


// Routes pour gérer les groupes
Route::get('/groupes', [GroupeController::class, 'index'])->name('groupes.index'); // Afficher tous les groupes
Route::get('/groupes/{groupe}', [GroupeController::class, 'show'])->name('groupes.show'); // Afficher un seul groupe
Route::post('/groupes', [GroupeController::class, 'create'])->name('groupes.create'); // Créer un nouveau groupe
Route::put('/groupes/{groupe}', [GroupeController::class, 'update'])->name('groupes.update'); // Mettre à jour un groupe existant
Route::delete('/groupes/{groupe}', [GroupeController::class, 'delete'])->name('groupes.delete'); // Supprimer un groupe

// Routes pour gérer les tirages
Route::get('/tirages', [TirageController::class, 'index'])->name('tirages.index');
Route::get('/tirages/{tirage}', [TirageController::class, 'show'])->name('tirages.show');
Route::post('/tirages', [TirageController::class, 'create'])->name('tirages.create');
Route::put('/tirages/{tirage}', [TirageController::class, 'update'])->name('tirages.update');
Route::delete('/tirages/{tirage}', [TirageController::class, 'delete'])->name('tirages.delete');

// Routes pour gérer les chapeaux
Route::get('/chapeaux', [ChapeauController::class, 'index'])->name('chapeaux.index');
Route::get('/chapeaux/{chapeau}', [ChapeauController::class, 'show'])->name('chapeaux.show');
Route::post('/chapeaux', [ChapeauController::class, 'create'])->name('chapeaux.create');
Route::put('/chapeaux/{chapeau}', [ChapeauController::class, 'update'])->name('chapeaux.update');
Route::delete('/chapeaux/{chapeau}', [ChapeauController::class, 'delete'])->name('chapeaux.delete');



// Route pour déplacer un club lors d'un tirage suivant
// Route::post('/clubs/{clubId}/move/{nouveauGroupeId}', [ClubController::class, 'move'])->name('clubs.move');


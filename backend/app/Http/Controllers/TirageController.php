<?php

namespace App\Http\Controllers;

use App\Models\Tirage;
use Illuminate\Http\Request;

class TirageController extends Controller
{
    // Afficher tous les tirages
    public function index()
    {
        $tirages = Tirage::all();
        return response()->json($tirages);
    }

    // Afficher un seul tirage
    public function show($id)
    {
        $tirage = Tirage::findOrFail($id);
        return response()->json($tirage);
    }

    // Créer un nouveau tirage
    public function create(Request $request)
    {
        $tirage = Tirage::create($request->all());
        return response()->json($tirage, 201);
    }

    // Mettre à jour un tirage existant
    public function update(Request $request, $id)
    {
        $tirage = Tirage::findOrFail($id);
        $tirage->update($request->all());
        return response()->json($tirage, 200);
    }

    // Supprimer un tirage
    public function delete($id)
    {
        Tirage::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

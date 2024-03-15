<?php

namespace App\Http\Controllers;

use App\Models\Chapeau;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChapeauController extends Controller
{
    // Afficher tous les chapeaux
    public function index()
    {
        $chapeaux = Chapeau::all();
        return response()->json($chapeaux);
    }

    // Afficher un seul chapeau
    public function show($id)
    {
        $chapeau = Chapeau::findOrFail($id);
        return response()->json($chapeau);
    }

    // Créer un nouveau chapeau
    public function create(Request $request)
    {
        $request->validate([
            'rang_id' => 'required|integer',
            'rang' => 'required|integer',
        ]);

        $chapeau = Chapeau::create($request->all());
        return response()->json($chapeau, 201);
    }

    // Mettre à jour un chapeau existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'rang_id' => 'required|integer',
            'rang' => 'required|integer',
        ]);

        $chapeau = Chapeau::findOrFail($id);
        $chapeau->update($request->all());
        return response()->json($chapeau, 200);
    }

    // Supprimer un chapeau
    public function delete($id)
    {
        $chapeau = Chapeau::findOrFail($id);
        $chapeau->delete();
        return response()->json(null, 204);
    }
}

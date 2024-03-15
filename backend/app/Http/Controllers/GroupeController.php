<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    // Afficher tous les groupes
    public function index()
    {
        $groupes = Groupe::all();
        return response()->json($groupes);
    }

    // Afficher un seul groupe
    public function show($id)
    {
        $groupe = Groupe::findOrFail($id);
        return response()->json($groupe);
    }

    // Créer un nouveau groupe
    public function create(Request $request)
    {
        $groupe = Groupe::create($request->all());
        return response()->json($groupe, 201);
    }

    // Mettre à jour un groupe existant
    public function update(Request $request, $id)
    {
        $groupe = Groupe::findOrFail($id);
        $groupe->update($request->all());
        return response()->json($groupe, 200);
    }

    // Supprimer un groupe
    public function delete($id)
    {
        Groupe::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

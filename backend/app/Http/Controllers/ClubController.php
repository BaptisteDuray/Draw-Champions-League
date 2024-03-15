<?php
namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClubController extends Controller
{
    // Afficher tous les clubs
    public function index()
    {
        $clubs = Club::all();
        return response()->json($clubs);
    }

    // Afficher un seul club
    public function show($id)
    {
        $club = Club::findOrFail($id);
        return response()->json($club);
    }

    // Créer un nouveau club
    public function create(Request $request)
    {
        $club = Club::create($request->all());
        return response()->json($club, 201);
    }

    // Mettre à jour un club existant
    public function update(Request $request, $id)
    {
        $club = Club::findOrFail($id);
        $club->update($request->all());
        return response()->json($club, 200);
    }

    // Supprimer un club
    public function delete($id)
    {
        Club::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    // Déplacer un club lors d'un tirage suivant
    public function move(Request $request, $clubId, $nouveauGroupeId)
    {
        $club = Club::findOrFail($clubId);

        // Vérifier si le club appartient déjà à un groupe
        if ($club->groupe_id !== null) {
            return response()->json(['error' => 'Le club est déjà dans un groupe'], 400);
        }

        // Déplacer le club dans le nouveau groupe spécifié
        $club->groupe_id = $nouveauGroupeId;
        $club->save();

        // Rafraîchir la vue ou renvoyer les données mises à jour
        return response()->json(['message' => 'Club déplacé avec succès dans le groupe ' . $nouveauGroupeId]);
    }
}

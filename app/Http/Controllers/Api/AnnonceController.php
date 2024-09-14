<?php

namespace App\Http\Controllers\Api;

use App\Models\Annonce;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{

    public function index()
    {

        $annonce = Annonce::with('bienImmobilier')->get();

        return response()->json($annonce);
    }

    public function show(string $id)
    {
        $annonce = Annonce::findOrFail($id)
            ->load('bienImmobilier');
        return response()->json($annonce);
    }
    /**
     * Enregistrer une annonce dans la base de donnée
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'required|text',
            'type_annonce' => 'required|enum',
            'statut' => 'required|enum',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $annonce = new Annonce([
            'prix' => $request->get('prix'),
            'description' => $request->get('description'),
            'type_annonce' => $request->get('type_annonce'),
            'statut' => $request->get('statut'),
            'image' => $imagePath,
        ]);
        $annonce->save();

        return response()->json($annonce, 201);
    }

    /**
     * Modifier un bien
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'required|text',
            'type_annonce' => 'required|enum',
            'statut' => 'required|enum',
        ]);

        $annonce = Annonce::find($id);

        if ($annonce) {
            $annonce->description = $request->description ?? $annonce->description;
            $annonce->prix = $request->prix ?? $annonce->prix;
            $annonce->type_annonce = $request->type_annonce ?? $annonce->type_annonce;
            $annonce->statut = $request->statut ?? $annonce->statut;


            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($annonce->image);
                $annonce->image = $request->file('image')->store('images', 'public');
            }

            $annonce->save();

            return response()->json($annonce, 200);
        }

        return response()->json(['error' => 'Annonce not found'], 404);
    }

    /**
     * Supprimer un bien
     */
    public function destroy($id)
    {
        $annonce = Annonce::find($id);

        if ($annonce) {
            if ($annonce->image) {
                Storage::disk('public')->delete($annonce->image);
            }
            $annonce->delete();
            return response()->json(['message' => 'Annonce retiré'], 200);
        }

        return response()->json(['error' => 'Annonce introuvable'], 404);
    }

    /**
     * Archiver un bien
     */
    public function archive(Annonce $annonce) : JsonResponse
    {
        try {
            // Update the 'is_archived' attribute of the burger to true
            $annonce->update(['is_archived' => true]);

            // Return a JSON response with a status code of 204 (No Content)
            return response()->json(null, 204);
        } catch (\Exception $exception) {
            // Return a JSON response with the exception message and a status code of 500 (Internal Server Error)
            return response()->json($exception->getMessage(), 500);
        }
    }
    /**
     * Restaurer un bien
     */
    public function restore(Annonce $annonce) : JsonResponse
    {
        try {
            // Update the Burger to set is_archived to false
            $annonce->update(['is_archived' => false]);
            // Return a success response with no content
            return response()->json(null, 204);
        } catch (\Exception $exception) {
            // Return an error response with the exception message
            return response()->json($exception->getMessage(), 500);
        }
    }

}


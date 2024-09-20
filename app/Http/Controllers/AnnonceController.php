<?php

namespace App\Http\Controllers;

use App\Http\Requests\addAnnonceRequest;
use App\Models\Annonce;
use App\Models\BienImmobilier;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonce = Annonce::with('bienImmobilier')->paginate(10);
        return view('admin.annonce.index', ['annonce' => $annonce]);
    }
    


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $annonces = BienImmobilier::where('type_bien_id', 1)
      ->pluck('nom_immeuble', 'id');

    return view('admin.annonce.store', compact('annonces'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(addAnnonceRequest $request)
  {
      $validated = $request->validated();
  
      Annonce::create($validated);
  
      return redirect()->route('annonce.index')->with('success', 'Annonce créée avec succès');
  }
  
  /**
   * Display the specified resource.
   */
  public function show(Annonce $annonce)
  {
    $annonce->load('bienImmobilier');
    return view('admin.annonce.show', compact('annonce'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Annonce $annonce)
  {
    $immeubles = BienImmobilier::where('type_bien_id', 1)
      ->pluck('nom_immeuble', 'id');
    return view('admin.annonce.edit', compact('annonce', 'immeubles'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Annonce $annonce)
{
    $validated = $request->validate([
        'type_annonce' => 'required|in:location,vente',
        'description' => 'required|string',
        'statut' => 'required|in:disponible,indisponible',
        'prix' => 'required|numeric',
        'bien_immobilier_id' => 'required|exists:bien_immobiliers,id', 
    ]);

    $annonce->update($validated);
    return redirect()->route('annonce.index')->with('success', 'Annonce mise à jour avec succès');
}

  
  
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Annonce $annonce)
  {
    $annonce->delete();
    return redirect()->route('annonce.index');
  }

}

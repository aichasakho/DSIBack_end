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
    $annonces = Annonce::with('bienImmobilier')->paginate(10);
    return view('admin.annonce.index', ['annonces' => $annonces]);
  }



  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $biens = BienImmobilier::all();
    return view('admin.annonce.store', compact('biens'));
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
    $biens = BienImmobilier::all();
    return view('admin.annonce.edit', compact('annonce', 'biens'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Annonce $annonce)
  {
    $validated = $request->validate([
      'type_annonce' => 'required|string|max:255',
      'description' => 'required|string',
      'statut' => 'required|string',
      'prix' => 'required|numeric',
      'bien_immobilier_id' => 'required|integer|exists:bien_immobiliers,id',
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

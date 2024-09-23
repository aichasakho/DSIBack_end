<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddContratRequest;
use App\Models\User;
use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Models\BienImmobilier;

class ContratController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $contrats = Contrat::with('bien_immobilier', 'client', 'agent', 'proprietaire')
      ->paginate(10);
    return view('admin.contrat.index', compact('contrats'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $biens = BienImmobilier::all()->load('type_bien', 'localite', 'proprietaire', 'agent');
    $clients = User::where('role', 'client')->get();
    return view('admin.contrat.store', compact('biens', 'clients'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AddContratRequest $request)
  {
    $validated = $request->validated();

    $bien = BienImmobilier::find($request->bien_immobilier_id)->load('proprietaire', 'agent');

    $validated['proprietaire_id'] = $bien->proprietaire->id;
    $validated['agent_id'] = $bien->agent->id;

    Contrat::create($validated);
    return redirect()->route('contrat.index')
      ->with('success', 'Contrat ajouté avec succès');
  }

  /**
   * Display the specified resource.
   */
  public function show(Contrat $contrat)
  {
    $contrat->load('bien_immobilier', 'client', 'agent', 'proprietaire', 'reglements');
    return view('admin.contrat.show', compact('contrat'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Contrat $contrat)
  {
    $contrat->load('bien_immobilier', 'client', 'agent', 'proprietaire', 'reglements');
    return view('admin.contrat.edit', compact('contrat'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Contrat $contrat)
  {

    $validated = $request->validate([
      'date_debut' => 'required|date',
      'date_fin' => 'required|date',
      'montant' => 'required|numeric',
      'type_contrat' => 'required|string|max:255',
    ]);

    $contrat->update($validated);
    return to_route('contrat.index')
      ->with('success', 'Contrat modifié avec succès');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Contrat $contrat)
  {
    $contrat->delete();
    return to_route('admin.contrat.index')
      ->with('success', 'Contrat supprimé avec succès');
  }
}

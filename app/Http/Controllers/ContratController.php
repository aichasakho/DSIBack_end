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
    $contrat = Contrat::with('bien_immobilier', 'client', 'agent', 'proprietaire')
      ->paginate(10);
    return view('admin.contrat.index', compact('contrat'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $biens = BienImmobilier::all();
    $clients = User::where('role', 'client')->get();
    return view('admin.contrat.store', compact('biens', 'clients'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AddContratRequest $request)
  {

    Contrat::create($request->validated());
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
    $contrat->update($request->validated());
    return to_route('admin.contrat.index')
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

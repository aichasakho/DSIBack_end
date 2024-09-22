<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDetailReglementRequest;
use App\Models\Reglement;
use Illuminate\Http\Request;
use App\Models\DetailsReglement;

class DetailReglementController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $detailReglement = DetailsReglement::with('reglement')->get();
    return view('admin.detailReglement.index', compact('detailReglement'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $reglement = Reglement::all();
    return view('admin.detailReglement.create', compact('reglement'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AddDetailReglementRequest $request)
  {
    DetailsReglement::create($request->validated());
    return redirect()->route('detailReglement.index')
      ->with('success', 'DetailReglement ajouté avec succès');
  }

  /**
   * Display the specified resource.
   */
  public function show(DetailsReglement $detailReglement)
  {
    $detailReglement->load('reglement');
    return view('admin.detailReglement.show', compact('detailReglement'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(DetailsReglement $detailReglement)
  {
    return view('admin.detailReglement.edit', compact('detailReglement'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(AddDetailReglementRequest $request, DetailsReglement $detailReglement)
  {
    $detailReglement->update($request->validated());
    return redirect()->route('detailReglement.index')->with('success', 'DetailReglement modifié avec succès');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(DetailsReglement $detailReglement)
  {
    $detailReglement->delete();
    return redirect()
      ->back()
      ->with('success', 'DetailReglement supprimé avec succès');
  }
}

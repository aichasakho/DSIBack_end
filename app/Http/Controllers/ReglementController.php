<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddReglementRequest;
use App\Models\Reglement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReglementController extends Controller
{

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $reglement = Reglement::with('reservation')->get();
    return view('admin.reglement.index', compact('reglement'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AddReglementRequest $request)
  {

  }

  /**
   * Display the specified resource.
   */
  public function show(Reglement $reglement)
  {
    return view('admin.reglement.show', compact('reglement'));
  }


  public function downloadFacture($id)
  {
    // Récupérez les données nécessaires à la facture en fonction de l'identifiant $id

    $reservation = Reservation::findOrFail($id);

    // Générez la facture au format PDF en utilisant les données récupérées
    $pdf = PDF::loadView('facture', compact('reservation'));

    // Téléchargez le fichier PDF
    return $pdf->download('facture.pdf');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Reglement $reglement)
  {
    return view(
      'admin.reglement.form',
      compact('reglement')
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(AddReglementRequest $request, Reglement $chauffeur)
  {
    $chauffeur->update($request->validated());

    return to_route('admin.reglement.index')
      ->with('success', 'Reglement modifié avec succès');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Reglement $reglement)
  {
    $reglement->delete();

    return redirect()
      ->back()
      ->with('success', 'reglement supprimé avec succès');
  }
}

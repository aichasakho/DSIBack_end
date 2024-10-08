<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Reglement;
use App\Models\Reservation;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Requests\AddReglementRequest;

class ReglementController extends Controller
{

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $reglements = Reglement::with('contrat')->get();
    return view('admin.reglement.index', compact('reglements'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $contrat = Contrat::all();
    $agents = User::where('role', 'admin')->get();

    return view('admin.reglement.store', compact('contrat', 'agents'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AddReglementRequest $request)
  {

    Reglement::create($request->validated());
    return redirect()->route('reglement.index')
      ->with('success', 'Reglement ajouté avec succès');
  }

  /**
   * Display the specified resource.
   */
  public function show(Reglement $reglement)
  {
    $reglement->load('contrat');
    return view('admin.reglement.show', compact('reglement'));
  }

  /*

  public function downloadFacture($id)
  {
    // Récupérez les données nécessaires à la facture en fonction de l'identifiant $id

    $reservation = Reservation::findOrFail($id);

    // Générez la facture au format PDF en utilisant les données récupérées
    $pdf = PDF::loadView('facture', compact('reservation'));

    // Téléchargez le fichier PDF
    return $pdf->download('facture.pdf');
  }
    */

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Reglement $reglement)
  {
    return view(
      'admin.reglement.edit',
      compact('reglement')
    );
  }

  public function reglement(contrat $contrat )
  {

    return view('admin.reglement.store', compact('contrat'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(AddReglementRequest $request, Reglement $reglement)
  {
    $reglement->update($request->validated());
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


  public function generatePDF()
  {
    $reglements = Reglement::with('contrat')->get();
    $pdf = Pdf::loadView('admin.reglement.pdf', compact('reglements'));
    return $pdf->download('reglements.pdf');
  }
}

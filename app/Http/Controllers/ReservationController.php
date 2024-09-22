<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $reservation = Reservation::with('client', 'bien_immobilier')->paginate();
    return view('admin.reservation.index', compact('reservation'));
  }


  /**
   * Display the specified resource.
   */
  public function show(Reservation $reservation)
  {
    $reservation->load('client', 'bien_immobilier');
    return view('admin.reservation.show', compact('reservation'));
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Reservation $reservation)
  {
    $reservation->delete();
    return redirect()->route('admin.reservation.index');
  }

  public function annuler(Reservation $reservation)
  {
    $reservation->update([
      'statut' => false,
    ]);
    return redirect()->route('admin.reservation.index');
  }

  public function confirmer(Reservation $reservation)
  {
    $reservation->update([
      'statut' => true,
    ]);
    return redirect()->route('admin.reservation.index');
  }
}

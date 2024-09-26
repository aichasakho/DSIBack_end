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
    $reservations = Reservation::with('client', 'bien_immobilier')->paginate();
    return view('admin.reservation.index', compact('reservations'));
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
    return redirect()->route('reservation.index');
  }

  public function refuser(Reservation $reservation)
  {
    $reservation->statut = false;
    $reservation->save();
    toastr('Reservation refusee');
    return redirect()->route('reservation.index');
  }

  public function valider(Reservation $reservation)
  {
    $reservation->statut = true;
    $reservation->save();
    toastr('Reservation validee');
    return redirect()->route('reservation.index');
  }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ReponseReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    $reservation->load('client');
    $reservation->statut = true;
    $reservation->save();
    // Envoyer l'email
    Mail::to($reservation->client->email)->send(new ReponseReservation($reservation));

    toastr('Reservation validée');
    return redirect()->route('reservation.index');
  }
}

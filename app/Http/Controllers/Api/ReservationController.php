<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): JsonResponse
  {
    $reservations = Reservation::all();
    return response()->json($reservations);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'date_debut' => 'required|date',
      'date_fin' => 'required|date',
      'profession' => 'required|string|max:255',
      'situation_matrimonial' => 'required|string',
      'client_nom' => 'required|string|max:255',
      'client_id' => 'numeric',
      'bien_immobilier_id' => 'required|integer|exists:bien_immobiliers,id',
    ]);

    $reservation = Reservation::create($validated);
    return response()->json($reservation, 201);
  }

  public function getClientReservations(User $client) {
    $reservations = Reservation::with('bien_immobilier')
      ->where('client_id', $client->id);
    return response()->json($reservations, 200);
  }

  /**
   * Display the specified resource.
   */
  public function show(Reservation $reservation)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Reservation $reservation)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Reservation $reservation)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Reservation $reservation)
  {
    //
  }
}

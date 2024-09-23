<?php

namespace App\Http\Controllers;

use App\Http\Requests\addAnnonceRequest;
use App\Http\Requests\AddLocaliteRequest;
use App\Models\Annonce;
use App\Models\Localite;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $localite = Localite::all();
      return view('admin.localite.index', ['localite' => $localite]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $localites = Localite::all();

      return view('admin.localite.store', compact('localites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(addLocaliteRequest $request)
    {
      $validated = $request->validated();

      Localite::create($validated);

      return redirect()->route('localite.index')->with('success', 'Localité créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Localite $localite)
    {
      $localite->load('localite');
      return view('admin.localite.show', compact('localite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Localite $localite)
    {
      $localites = Localite::all();
      return view('admin.localite.edit', compact('localite', 'localites'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Localite $localite)
    {
      $validated = $request->validate([
        'region' => 'required|string|max:255',
        'ville' => 'required|string',
        'quartier' => 'required|string',

      ]);

      $localite->update($validated);
      return redirect()->route('localite.index')->with('success', 'Localite mise à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Localite $localite)
    {
      $localite->delete();
      return redirect()->route('localite.index');
    }
}

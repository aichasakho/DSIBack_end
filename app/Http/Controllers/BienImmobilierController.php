<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBienImmobilierRequest;
use App\Http\Requests\AddImmeubleRequest;
use App\Models\Appartement;
use App\Models\BienImmobilier;
use App\Models\Localite;
use App\Models\TypeBien;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BienImmobilierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biens = BienImmobilier::with('type_bien', 'localite', 'proprietaire')
            ->paginate(10);
        return view('admin.bien.index', compact('biens'));
    }

// Immeuble
    public function addImmeuble(){
      $proprietaires = User::where('role', 'proprietaire')->get();
      $localites = Localite::all();

      return view('admin.immeuble.add', compact( 'proprietaires', 'localites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.bien.store');
    }

    public function storeImmeuble(AddImmeubleRequest $request): RedirectResponse
    {
      $data = $request->validated();

      if ($request->hasFile('image')) {
        $image = $request->file('image')->store('bien', 'public');

        $data['image'] = $image;
        $data['image'] = asset('storage/'. $data['image']);
      }

      BienImmobilier::create($data);
      return redirect()->route('bienImmobilier.index')
        ->with('success', 'Immeuble ajoute avec succes');
  }




    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBienImmobilierRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(BienImmobilier $bienImmobilier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BienImmobilier $bienImmobilier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BienImmobilier $bienImmobilier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BienImmobilier $bienImmobilier)
    {
        //
    }
}

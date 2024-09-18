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

  /* Debut CRUD de l'immeuble */

  // Immeuble
  public function addImmeuble()
  {
    $proprietaires = User::where('role', 'proprietaire')->get();
    $localites = Localite::all();

    return view('admin.immeuble.add', compact('proprietaires', 'localites'));
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
      $data['image'] = asset('storage/' . $data['image']);
    }

    BienImmobilier::create($data);
    return redirect()->back()
      ->with('success', 'Immeuble ajoute avec succes');
  }

  public function editImmeuble(BienImmobilier $immeuble): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
  {
    $proprietaires = User::where('role', 'proprietaire')->get();
    $localites = Localite::all();


    return view(
      'admin.immeuble.edit',
      compact('immeuble', 'proprietaires', 'localites')
    );
  }

  public function updateImmeuble(AddImmeubleRequest $request, BienImmobilier $immeuble): RedirectResponse
  {

    $data = $request->validated();

    if ($request->hasFile('image')) {
      $image = $request->file('image')->store('bien', 'public');

      $data['image'] = $image;
      $data['image'] = asset('storage/' . $data['image']);
    }

    if ($immeuble->image) {
      if (file_exists(public_path($immeuble->image))) {
        unlink(public_path($immeuble->image));
      }
    }

    if ($immeuble->update($data)) {
      return redirect()->route('bienImmobilier.index');
    }

    return redirect()->back()->with('error', 'Une erreur est survenue');
  }

  /* Fin CRUD de l'immeuble */

  /* Debut CRUD maison */


  /* Fin CRUD maison */

  /* Debut CRUD terrain */
  /* Fin CRUD terrain */


  public function archived(BienImmobilier $bien): RedirectResponse
  {

    if ($bien->update(['is_archived' => 1])) {
      return redirect()->back()->with('success', 'Bien Immobilier archive avec succes');
    }
    return redirect()->back()->with('error', 'Une erreur est survenue');
  }

  public function restore(BienImmobilier $bien): RedirectResponse
  {
    if ($bien->update(['is_archived' => 0])) {
      return redirect()->back()->with('success', 'Bien Immobilier restaure avec succes');
    }
    return redirect()->back()->with('error', 'Une erreur est survenue');
  }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Annonce;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{

    public function index()
    {

        $annonce = Annonce::with('bienImmobilier')->get();
        return response()->json($annonce);
    }

    public function show(string $id)
    {
        $annonce = Annonce::findOrFail($id)
            ->load('bienImmobilier');
        return response()->json($annonce);
    }

  public function location()
  {

    $annonce = Annonce::with('bienImmobilier')->where('type_annonce','location')->get();
    return response()->json($annonce);
  }

  public function vente()
  {

    $annonce = Annonce::with('bienImmobilier')->where('type_annonce','vente')->get();
    return response()->json($annonce);
  }

}


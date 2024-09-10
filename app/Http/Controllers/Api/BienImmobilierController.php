<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\BienImmobilier;
use App\Http\Controllers\Controller;

class BienImmobilierController extends Controller
{

    public function index()
    {
        $bienImmobilier = BienImmobilier::with('type_bien', 'localite', 'proprietaire')->get();
        return response()->json($bienImmobilier);
    }

    public function show(string $id)
    {
        $bienImmobilier = BienImmobilier::findOrFail($id)
            ->load('type_bien', 'localite', 'proprietaire');
        return response()->json($bienImmobilier);
    }

}

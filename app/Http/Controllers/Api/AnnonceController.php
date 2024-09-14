<?php

namespace App\Http\Controllers\Api;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnonceController extends Controller
{

    public function index()
    {

        $annonce = Annonce::with('bienImmobilier')->get();

        return response()->json($annonce);
    }
}

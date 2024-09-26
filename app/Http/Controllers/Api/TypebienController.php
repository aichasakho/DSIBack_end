<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\typebien;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class TypebienController extends Controller
{

    public function index()
    {

    $type_bien = TypeBien::with('bienImmobilier')->get();
    return response()->json($type_bien);

    }


}

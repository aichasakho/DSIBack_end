<?php

namespace App\Http\Controllers;

use App\Models\BienImmobilier;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bien.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

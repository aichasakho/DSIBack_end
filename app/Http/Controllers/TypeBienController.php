<?php

namespace App\Http\Controllers;

use App\Models\typebien;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class typebienController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $typebiens = TypeBien::all();
    return view('admin.typebien.index', compact('typebiens'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.typebien.store');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'type_bien' => 'required',
    ]);
    TypeBien::create($request->all());

  }

  /**
   * Display the specified resource.
   */
  public function show(TypeBien $typebien)
  {
    return view('admin.typebien.show', compact('typebien'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(TypeBien $typebien)
  {
    return view('admin.typebien.edit', compact('typebien'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, TypeBien $typebien)
  {
    $request->validate([
      'type_bien' => 'required',
    ]);
    $typebien->update($request->all());
    toastr('Type bien mise à jour avec succès');
    return redirect()->route('typebien.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(TypeBien $typebien)
  {
    $typebien->delete();
    toastr('Type bien deleted successfully');
    return redirect()->route('typebien.index');
  }
}

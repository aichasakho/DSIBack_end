<?php

namespace App\Http\Controllers;

use App\Models\TypeBien;
use Illuminate\Http\Request;

class TypeBienController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $typeBiens = TypeBien::all();
    return view('admin.typeBien.index', compact('typeBiens'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.typeBien.create');
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
    return redirect()->route('admin.typeBien.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(TypeBien $typeBien)
  {
    return view('admin.typeBien.show', compact('typeBien'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(TypeBien $typeBien)
  {
    return view('admin.typeBien.edit', compact('typeBien'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, TypeBien $typeBien)
  {
    $request->validate([
      'type_bien' => 'required',
    ]);
    $typeBien->update($request->all());
    return redirect()->route('admin.typeBien.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(TypeBien $typeBien)
  {
    $typeBien->delete();
    return redirect()->route('admin.typeBien.index');
  }
}

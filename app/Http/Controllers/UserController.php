<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('user.index', compact('users'));
  }

  public function show(User $user)
  {
    return view('user.show', compact('user'));
  }

  public function allClients()
  {
    $users = User::where('role', 'client')->get();
    return view('user.allClients', compact('users'));
  }

  public function allAdmins()
  {
    $users = User::where('role', 'admin')->get();
    return view('user.allAdmins', compact('users'));
  }

  public function allProrietaires()
  {
    $users = User::with('bien_immobiliers')
      ->where('role', 'proprietaire')->get();
    return view('user.allProrietaires', compact('users'));
  }

  public function edit(User $user)
  {
    return view('user.edit', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    $user->update($request->all());
    return redirect()->route('admin.user.index');
  }

  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('admin.user.index');
  }
}

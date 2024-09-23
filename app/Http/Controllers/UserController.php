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


//client
  public function addClient()
  {
    $users = User::where('role', 'client')->get();
    return view('admin.client.add', compact('users'));
  }

  public function editClient()
  {
    $users = User::with('bien_immobiliers')
      ->where('role', 'client')->get();
    return view('admin.client.edit', compact('users'));
  }


//agent
  public function addAgent()
  {
    $users = User::where('role', 'admin')->get();
    return view('admin.agent.add', compact('users'));
  }

  public function editAgent()
  {
    $users = User::with('bien_immobiliers')
      ->where('role', 'admin')->get();
    return view('admin.agent.edit', compact('users'));
  }



//proprietaire
  public function addProprietaire()
  {
    $users = User::with('bien_immobiliers')
      ->where('role', 'proprietaire')->get();
    return view('admin.proprietaire.add', compact('users'));
  }
  public function editProprietaire()
  {
    $users = User::with('bien_immobiliers')
      ->where('role', 'proprietaire')->get();
    return view('admin.proprietaire.edit', compact('users'));
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

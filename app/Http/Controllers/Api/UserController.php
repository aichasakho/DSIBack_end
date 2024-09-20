<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\UserFormRequest;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return response()->json($users, 200);
  }

  public function show($id)
  {
    $user = User::find($id);
    return response()->json($user, 200);
  }

  public function getClients()
  {
    $users = User::all()->where('role', 'client');
    return response()->json($users, 200);
  }

  public function getAdmins()
  {
    $users = User::where('role', 'admin')->get();
    return response()->json($users, 200);
  }

  public function getProrietaires()
  {
    $users = User::all()->where('role', 'proprietaire');
    return response()->json($users, 200);
  }

  public function addAdmin(UserFormRequest $request)
  {

    $user = User::create([
      $request->only('nom', 'prenom', 'email', 'password', 'tel', 'ninea', 'regitreDeCommerce'),
      'role' => 'admin',
    ]);
    return response()->json($user, 200);
  }

  public function addClient(UserFormRequest $request)
  {
    $user = User::create([
      $request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'),
      'role' => 'client',
    ]);
    return response()->json($user, 200);
  }

  public function addProprietaire(UserFormRequest $request)
  {
    $user = User::create([
      $request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'),
      'role' => 'proprietaire',
    ]);
    return response()->json($user, 200);
  }

  public function login(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
      throw ValidationException::withMessages([
        'email' => ['l\'email ou le mot de passe est incorrect'],
      ]);
    }
    $token = $user->createToken('MyApp')->plainTextToken;

    return response()->json(['user' => $user, 'token' => $token], 200);
  }

  public function me()
  {
    return response()->json(Auth::user(), 200);
  }

  public function logout()
  {
    User::find(Auth::user()->id)->tokens()->delete();
    return response()->json(['message' => 'Logged out'], 200);
  }

  public function update(UserFormRequest $request, $id)
  {
    $user = User::find($id);
    $user->update($request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'));
    return response()->json($user, 200);
  }

  public function delete($id)
  {
    $user = User::find($id);
    $user->delete();
    return response()->json($user, 200);
  }
}

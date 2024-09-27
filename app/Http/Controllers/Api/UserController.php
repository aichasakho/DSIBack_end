<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Contrat;
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
    $user = User::create(array_merge(
      $request->only('nom', 'prenom', 'email', 'tel', 'ninea', 'regitreDeCommerce'),
      [
        'password' => Hash::make($request->password), // Hachage du mot de passe
        'role' => 'admin',
      ]
    ));
    return response()->json($user, 201);
  }

  public function getLocataires(User $proprietaire)
  {
    $locataire_id = Contrat::all()
      ->where('proprietaire_id', $proprietaire->id)
      ->get('client_id');

    $getLocataires = User::whereIn('id', $locataire_id)->get();

    return response()->json($getLocataires, 200);
  }

  public function addProprietaire(UserFormRequest $request)
  {
    $user = User::create(array_merge(
      $request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'),
      ['role' => 'proprietaire']
    ));
    return response()->json($user, 201);
  }


  public function addClient(UserFormRequest $request)
  {
    try {
      $user = User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'tel' => $request->tel,
        'cni' => $request->cni,
        'adresse' => $request->adresse,
        'role' => 'client',
      ]);
      return response()->json($user, 201);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Error occurred while creating client',
        'error' => $e->getMessage()
      ], 500);
    }
  }





  // public function addProprietaire(UserFormRequest $request)
  // {
  //   $user = User::create([
  //     $request->only('nom', 'prenom', 'email', 'password', 'tel', 'cni', 'adresse'),
  //     'role' => 'proprietaire',
  //   ]);
  //   return response()->json($user, 200);
  // }

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

    
    if (!$user->statut) {
      throw ValidationException::withMessages([
        'email' => ['Votre compte est inactif. Si Vous venez de vous inscrire veuillez
        attendre votre compte est en cours d\'activation.'],
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

<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\AgentAntenne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginUserController extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }

    public function createCompte ()
    {
        $agent = new AgentAntenne();

        return view('auth.createUser', ['user'=>$agent]);
    }

    public function store (Request $Request)
    {
        $validatedData = $Request->validate([
            'nom' => 'required|string|max:255',
            'role' => 'required|in:agent,chef_antenne',
            'phone' => 'required|string|max:10',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:agent_antennes',
            'password' => 'required|string|max:25',
            'nom_antenne' => 'required|string|max:255'
        ]);

        $agents = AgentAntenne::create([
            'nom' => $validatedData['nom'],
            'role' => $validatedData['role'],
            'phone' => $validatedData['phone'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'nom_antenne' => $validatedData['nom_antenne']
        ]);

        $ecoles = Ecole::with('chefBattement')->orderBy('created_at', 'asc')->get();

        return view('layouts.index', [
            'agents'=>$agents,
            'ecoles'=>$ecoles
        ])->with('success', 'agent créé avec succès');
    }

    public function dologin (Request $Request)
    {    
        $requetteValidate = $Request->validate([
          'password' => 'required|min:5',
          'email' => 'required|email'
        ]);

        if(Auth::attempt($requetteValidate))
        {
            $Request->session()->regenerate();
            return redirect()->route('dinacope.ecole.index');
        }

        return back()->withErrors([
            'email'=> 'email pas valide',
            'password' => 'password pas valide'
        ])->onlyInput('email', 'password');
        

    }

    public function logout ()
    {

    }
}

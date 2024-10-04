<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\AgentAntenne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Contracts\AgentServiceInterface;

class AgentServiceController extends Controller
{

    public function create ()
    {
        $agent = new AgentAntenne();

        return view('layouts.forms.creeAgent', [
            'agent'=>$agent
        ]);
    }

    public function store (Request $Request)
    {
        $validatedData = $Request->validate([
            'nom' => 'required|string|min:2',
            'email' => 'required|email|unique:agent_antennes',
            'password' => 'required|string|max:25',
            'prenom' => 'required|string|max:255',
            'nom_antenne' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'role' => 'required|in:agent,chef_antenne' 
        ]);

        $agents = AgentAntenne::create([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => hash::make($validatedData['password']),
            'prenom' => $validatedData['prenom'],
            'nom_antenne' => $validatedData['nom_antenne'],
            'phone' => $validatedData['phone'],
            'role' => $validatedData['role']
        ]);

        $agents = AgentAntenne::all();

        $ecoles = Ecole::with('chefBattement')->orderBy('created_at', 'asc')->get();

        return view('layouts.index', [
            'agents'=>$agents,
            'ecoles'=>$ecoles
        ])->with('success', 'agent créé avec succes');

    }

    public function edit ()
    {
        return view('layouts.forms.basicForm');
    }

    public function destroy (Request $Request)
    {
        //on s'arrete ici
        dd($Request->nom);
        $agent = AgentAntenne::findOrFail($Request->id);
        $agent->delete();

        return redirect()->route('dinacope.ecole.index')->with('success', 'agent a été supprimé');
    }
    /*
    public function executeAgent (AgentServiceInterface $agent)
    {
        $data = [];
        $agent->creatAgent($data);

        return response()->json($agent);
    }

    public function getAgent (AgentServiceInterface $agent)
    {
        $id = 1;
        $agent->obtenirAgent($id);

        return $agent;
    }

    public function editAgent (AgentServiceInterface $agent)
    {
        $id = 1;
        $data = [];
        $agent->mettreAJourEcole($id, $data);

        return $agent;
    }

    public function deleteAgent (AgentServiceInterface $agent)
    {
        $id = 1;
        $agent->supprimerEcole($id);

        return $agent;
    }
    */
}

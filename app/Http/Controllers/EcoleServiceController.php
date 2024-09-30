<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;
use App\Models\ChefBattement;
use App\Contracts\EcoleServiceInterface;

class EcoleServiceController extends Controller
{
    public function index ()
    {
        return view('layouts.index', [
            'ecoles'=> Ecole::with('chefBattement')->orderBy('created_at', 'asc')->get()
        ]);
    }

    public function create ()
    {
        $ecole = new Ecole();
        $chef = new ChefBattement();

        return view('layouts.forms.basicForm', [
            'ecole' => $ecole,
            'chef' => $chef
        ]);
    }

    public function store(Request $request, EcoleServiceInterface $ecoleService)
    {
        $validatedData = $request->validate([
            'nom_ecole' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:255',

            //infos sur le chef,
            'nom_chef' => 'required|string|max:20',
            'email_chef' => 'required|email|unique:chef_battements,email_chef',
            'prenom_chef' => 'required|string|max:50'
        ]);

        //creation ecole
        $ecole = $ecoleService->creatEcole([
            'nom_ecole' => $validatedData['nom_ecole'],
            'adresse' => $validatedData['adresse'],
            'phone' => $validatedData['phone']
        ]);

        //creation chef d'etablissement
        $chef = ChefBattement::create([
            'nom_chef' => $validatedData['nom_chef'],
            'email_chef' => $validatedData['email_chef'],
            'prenom_chef' => $validatedData['prenom_chef'],
            'ecole_id' => $ecole->id
        ]);

        return redirect()->route('dinacope.ecole.index', [
            'ecole'=>$ecole,
            'chef'=> $chef
        ])->with('success', 'Ecole créé avec succès et le chef du battement.');
    }

    public function show ($id, EcoleServiceInterface $ecoleService)
    {
        $ecole = $ecoleService->obtenirEcole($id);

        return view('layouts.tables.ecole', [
            'ecole'=>$ecole
        ]);
    }

    public function edit (Ecole $ecole)
    {   
        return view('layouts.forms.basicForm', ['ecole'=>$ecole]);
    }

    public function update (Request $Request, $id, EcoleServiceInterface $ecoleService)
    {
        $validatedData = $Request->validate([
            'nom_ecole' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $ecole = $ecoleService->mettreAJourEcole($id,$validatedData);

        return redirect()->route('dinacope.ecole.index',[
            'ecole'=>$ecole
        ])->with('success', 'ecole modifié avec succé');
    }

    public function destroy (Ecole $ecole, EcoleServiceInterface $ecoleService)
    {
        $ecole = $ecoleService->supprimerEcole($ecole->id);
        
        return redirect()->route('dinacope.ecole.index')->with('success', 'ecole a été supprimé');
    }

}

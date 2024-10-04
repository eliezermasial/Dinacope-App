<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\AgentAntenne;
use Illuminate\Http\Request;
use App\Models\ChefBattement;
use App\Contracts\EcoleServiceInterface;
use App\Contracts\ChefBattementServiceInterface;

class EcoleServiceController extends Controller
{
    public function index ()
    {
        $agents = AgentAntenne::all();

        return view('layouts.index', [
            'ecoles'=> Ecole::with('chefBattement')->orderBy('created_at', 'asc')->get(),
            'agents'=>$agents
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

    public function store(Request $request, EcoleServiceInterface $ecoleService, 
                                    ChefBattementServiceInterface $chefService)
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

        //creation de chef de battement partant de l'ecole
        $chef =  $chefService->creatChefBattement([
            'nom_chef' => $validatedData['nom_chef'],
            'email_chef' => $validatedData['email_chef'],
            'prenom_chef' => $validatedData['prenom_chef'],
            'ecole_id' => $ecole->id
        ]);

        return redirect()->route('dinacope.ecole.index', [
            'ecole'=>$ecole,
            'chef'=> $chef
        ])->with('success', 'Ecole créé avec succès et le chef du battement');

    }

    public function show ($id, EcoleServiceInterface $ecoleService)
    {
        //afficher une ecole selon son identifiant
        $ecole = $ecoleService->obtenirEcole($id);

        return view('layouts.tables.ecole', [
            'ecole'=>$ecole->load('chefBattement')
        ]);

    }

    public function edit (Ecole $ecole)
    {   
        return view('layouts.forms.basicForm', ['ecole' => $ecole->load('chefBattement')]);
    }

    public function update (Request $Request, $id, EcoleServiceInterface $ecoleService,
                                            ChefBattementServiceInterface $chefBattementService)
    {
        $validatedData = $Request->validate([
            'nom_ecole' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:255',

            //champs pour chef de battement
            'nom_chef' => 'required|string|max:20',
            'email_chef' => 'required|email|unique:chef_battements,email_chef',
            'prenom_chef' => 'required|string|max:50'

        ]);

        $ecole = $ecoleService->mettreAJourEcole($id,[
            'nom_ecole' => $validatedData['nom_ecole'],
            'adresse' => $validatedData['adresse'],
            'phone' => $validatedData['phone']
            
        ]);
        
        $chef = $chefBattementService->mettreAJourChefBattement($Request->id, [
            'nom_chef' => $validatedData['nom_chef'],
            'prenom_chef' => $validatedData['prenom_chef'],
            'email_chef' => $validatedData['email_chef'],
        ]);

        return redirect()->route('dinacope.ecole.index',[
            'ecole'=>$ecole,
            'chef'=> $chef
        ])->with('success', 'ecole modifié avec succé');
    }

    public function destroy (Ecole $ecole, EcoleServiceInterface $ecoleService,
                            ChefBattementServiceInterface $chefBattementService)
    {
        
        try {
              $ecoleService->supprimerEcole($ecole->id);
              $chefBattementService->supprimerChef($ecole->chefBattement->id);
            
            return redirect()->route('dinacope.ecole.index')->with('success', 'ecole a été supprimé');

        } catch (\Exception $e) {
            return redirect()->route('dinacope.ecole.index')->with(
                'error', 'Erreur lors de la suppression de l\'école : ' . $e->getMessage()
            );
        }
        
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;
use App\Contracts\EcoleServiceInterface;

class EcoleServiceController extends Controller
{
    public function index ()
    {
        return view('layouts.index', [
            'ecoles'=> Ecole::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function create ()
    {
        $ecole = new Ecole();

        return view('layouts.forms.basicForm', [
            'ecole' => $ecole
        ]);
    }

    public function store(Request $request, EcoleServiceInterface $ecoleService)
    {
        $validatedData = $request->validate([
            'nom_ecole' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            //'date_naissance' => 'required|date',
        ]);
    
        $ecole = $ecoleService->creatEcole($validatedData);
    
        return redirect()->route('dinacope.ecole.index', [
            'ecole'=>$ecole
        ])->with('success', 'Ecole créé avec succès.');
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
        ])->with('success', 'eleve modifié avec succé');
    }

    public function destroy (Ecole $ecole, EcoleServiceInterface $ecoleService)
    {
        $ecole = $ecoleService->supprimerEcole($ecole->id);
        
        return redirect()->route('dinacope.ecole.index')->with('success', 'eleve a été supprimé');
    }
    /*
    public function executeEcole (EcoleServiceInterface $ecole)
    {
        $data = [];

        $ecole->creetEcole($data);
    }

    public function displayEcoles (EcoleServiceInterface $ecole)
    {
        $ecole->afficherEcoles();

        return $ecole;
    }

    public function getEcole (EcoleServiceInterface $ecole)
    {
        $ecole->obtenirEcole(1);

        return $ecole;
    }

    public function editEcole (EcoleServiceInterface $ecole)
    {
        $data = [];
        $id = 1;

        $ecole->mettreAJourEcole($id, $data);

        return $ecole;
    }

    public function deleteEcole (EcoleServiceInterface $ecole)
    {
        $id = 1;
        $ecole->supprimerEcole($id);

        return $ecole;
    }
        */

}

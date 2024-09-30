<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Eleve;
use Illuminate\Http\Request;
use App\Contracts\ElevesServiceInterface;

class ElevesServiceController extends Controller
{
    public function index (Ecole $ecole)
    {
        $eleves = $ecole->eleves; // Récupérer les élèves associés à l'école
        /*
        if ($eleves->isEmpty()) {
            dd('Pas d\'élèves associés à cette école');
        }*/
        
        return view('layouts.tables.eleve', [
            'ecole' => $ecole, // Passer l'école à la vue
            'eleves' => $eleves  // Passer les élèves à la vue
        ]);
        
    }
    
    public function create (Ecole $ecole)
    {
        $eleve = new Eleve();

        return view('layouts.forms.basicForm', [
            'ecole' => $ecole,
            'eleve' => $eleve
        ]);
    }

    public function store(Request $request, ElevesServiceInterface $eleveService, Ecole $ecole)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);
    
        // Ajouter l'ecole_id avant de créer l'élève
        $validatedData['ecole_id'] = $ecole->id;
        $eleve = $eleveService->creatEleve($validatedData);
    
        return redirect()->route('dinacope.ecole.eleve.index', [
            'ecole'=>$ecole,'eleves'=>$eleve->id])->with('success', 'Élève créé avec succès.');
    }

    public function show ($id, ElevesServiceInterface $eleveService)
    {
        $eleve = $eleveService->obtenirEleve($id);

        return view('layouts.tables.ecole', [
            'eleve'=>$eleve
        ]);
    }

    public function edit(Ecole $ecole, Eleve $eleve)
    {
        //Vérification pour s'assurer que l'élève appartient bien à l'écol
        if ($eleve->ecole_id !== $ecole->id) {
            abort(404, 'Cet élève n\'appartient pas à cette école.');
        }
    
        return view('layouts.forms.basicForm', ['ecole' => $ecole, 'eleve' => $eleve]);
    }
    

    public function update (Request $Request,Ecole $ecole, $id, ElevesServiceInterface $eleveService)
    {
        $validatedData = $Request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);

        $eleve = $eleveService->mettreAJourEleve($id,$validatedData);

        return redirect()->route('dinacope.ecole.eleve.index',[
            'ecole'=>$ecole,
            'eleve'=>$eleve
        ])->with('success', 'eleve modifié avec succé');
    }

    public function destroy (Eleve $eleve, ElevesServiceInterface $eleveService)
    {
        $eleve = $eleveService->supprimerEleve($eleve->id);
        
        return redirect()->route('dinacope.ecole.eleve.index')->with('success', 'eleve a été supprimé');
    }

}

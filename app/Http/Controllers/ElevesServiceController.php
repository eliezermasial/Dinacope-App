<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;
use App\Contracts\ElevesServiceInterface;

class ElevesServiceController extends Controller
{
    public function index ()
    {
        return view('layouts.index', [
            'eleves'=> Eleve::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function create ()
    {
        $eleve = new Eleve();

        return view('layouts.forms.basicForm', [
            'eleve' => $eleve
        ]);
    }

    public function store(Request $request, ElevesServiceInterface $eleveService)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);
    
        $eleve = $eleveService->creatEleve($validatedData);
    
        return redirect()->route('dinacope.eleve.index', [
            'eleve'=>$eleve->id
        ])->with('success', 'Élève créé avec succès.');
    }

    public function show ($id, ElevesServiceInterface $eleveService)
    {
        $eleve = $eleveService->obtenirEleve($id);

        return view('layouts.tables.ecole', [
            'eleve'=>$eleve
        ]);
    }

    public function edit (Eleve $eleve)
    {   
        return view('layouts.forms.basicForm', ['eleve'=>$eleve]);
    }

    public function update (Request $Request, $id, ElevesServiceInterface $eleveService)
    {
        $validatedData = $Request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);

        $eleve = $eleveService->mettreAJourEleve($id,$validatedData);

        return redirect()->route('dinacope.eleve.index',[
            'eleve'=>$eleve
        ])->with('success', 'eleve modifié avec succé');
    }

    public function destroy (Eleve $eleve, ElevesServiceInterface $eleveService)
    {
        $eleve = $eleveService->supprimerEleve($eleve->id);
        
        return redirect()->route('dinacope.eleve.index')->with('success', 'eleve a été supprimé');
    }

}

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
    public function create (/*ElevesServiceInterface $eleve*/)
    {
        $eleve = new Eleve();

        /*$data = [];

        $eleve->creatEleve($data);*/

        return view('layouts.forms.basicForm', [
            'eleve' => $eleve
        ]);
    }

    public function show (Request $Request,$id)
    {
        $eleve = Eleve::findOrFail($id);

        return view('layouts.tables.ecole', [
            'eleve'=>$eleve
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);
    
        Eleve::create($validatedData);
    
        return redirect()->route('dinacope.antenne.index')->with('success', 'Élève créé avec succès.');
    }
    
    public function edit ( $id)
    {
        /*$eleve = Eleve::findOrFail($id);
        return view('layouts.forms.basicForm', ['eleve'=>$eleve]);*/
    }
    /*
    public function getEleve (ElevesServiceInterface $eleve)
    {
        $eleve = $eleve->obtenirEleve(1);

        return $eleve;
    }

    public function edit (ElevesServiceInterface $eleve)
    {
        $data = [];
        $id = 1;

        $eleve = $eleve->mettreAJourEleve ($id, $data);

        return view('layouts.forms.basicForm');
    }

    public function deleteEleve (ElevesServiceInterface $eleve)
    {
        $id = 1;

        $eleve = $eleve->supprimerEleve($id);
    }*/
}

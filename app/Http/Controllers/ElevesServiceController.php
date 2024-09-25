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

    public function show (Request $Request)
    {
        return view('layouts.tables.ecole');
    }
    
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
    }
}

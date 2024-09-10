<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\EleveServiceInterface;

class EleveServiceController extends Controller
{
    public function executeEleve (EleveServiceInterface $eleve)
    {
        $data = [];

        $eleve->creatEleve($data);
    }

    public function obtenirEleve (EleveServiceInterface $eleve)
    {
        $eleves = $eleve->obtenirEleve();

        return response()->json($eleves);
    }
}

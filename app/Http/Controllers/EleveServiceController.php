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

        return $eleve;
    }

    public function getEleve (EleveServiceInterface $eleve)
    {
        $eleve = $eleve->obtenirEleve(1);

        return $eleve;
    }

    public function editEleve (EleveServiceInterface $eleve)
    {
        $data = [];
        $id = 1;

        $eleve = $eleve->mettreAJourEleve ($id, $data);

        return $eleve;
    }


    public function deleteEleve (EleveServiceInterface $eleve)
    {
        $id = 1;

        $eleve = $eleve->supprimerEleve($id);
    }
}

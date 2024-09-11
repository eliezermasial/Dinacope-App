<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\EcoleServiceInterface;

class EcoleServiceController extends Controller
{
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

}

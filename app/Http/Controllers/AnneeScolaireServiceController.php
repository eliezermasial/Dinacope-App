<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AnneeScolaireServiceInterface;

class AnneeScolaireController extends Controller
{
    public function creatAnneeScolaire (AnneeScolaireServiceInterface $schoolYear)
    {
        $data = [];
        $schoolYear->creatAgent($data);

        return $schoolYear;
    }

    public function getAnneeScolaire (AnneeScolaireServiceInterface $schoolYear)
    {
        $id = 1;
        $schoolYear->obtenirAnneeScolaire($id);

        return $schoolYear;
    }

    public function editAnneeScolaire (AnneeScolaireServiceInterface $schoolYear)
    {
        $data = [];
        $id = 1;

        $schoolYear->mettreAJourEcole($id, $data);

        return $schoolYear;
    }

    public function deleteAnneeScolaire (AnneeScolaireServiceInterface $schoolYear)
    {
        $id = 1;

        $schoolYear->supprimerEcole($id);

        return $schoolYear;
    }
}

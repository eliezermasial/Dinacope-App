<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ChefsEtablissementServiceInterface;

class ChefServiceController extends Controller
{
    public function executeChefEtablissement (ChefsEtablissementServiceInterface $chef)
    {
        $data = [];
        $chef->creatChefEtablissement($data);

        return $chef;
    }

    public function getChefEtablissament (ChefsEtablissementServiceInterface $chef)
    {
        $id = 1;
        $chef->obtenirChefEtablissamen($id);

        return $chef;
    }

    public function editeChefEtablissament (ChefsEtablissementServiceInterface $chef)
    {
        $id = 1;
        $data = [];

        $chef->mettreAJourChefEtablissement($id, $data);

        return $chef;
    }

    public function deleteChefEtablissement (ChefsEtablissementServiceInterface $chef)
    {
        $id = 1;
        $chef->supprimerChefEtablissement($id);

        return $chef;
    }
}

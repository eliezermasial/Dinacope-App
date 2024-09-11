<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AntenneServiceInterface;

class AntenneServiceController extends Controller
{
    public function executeAntenne (AntenneServiceInterface $antenne)
    {
        $data = [];

        $antenne->creetAntenne($data);

        return $antenne;
    }

    public function getAntenne (AntenneServiceInterface $antenne)
    {
        $id = 1;
        $antenne->obtenirAntenne($id);

        return $antenne;
    }

    public function editeAntenne (AntenneServiceInterface $antenne)
    {
        $id = 1;
        $data = [];

        $antenne->mettreAJourAntenne($id, $data);

        return $antenne;
    }
}

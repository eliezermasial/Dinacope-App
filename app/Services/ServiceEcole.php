<?php
namespace App\Services;

use App\Models\Ecole;
use App\Contracts\EcoleServiceInterface;

class ServiceEcole implements EcoleServiceInterface
{
    public function creatEcole(array $data)
    {
        $ecole = Ecole::create($data);

        return $ecole;
    }

    /*public function afficherEcoles()
    {
        $ecoles = Ecole::orderBy('created_at', 'desc')->get();

        return response()->json($ecoles);
    }*/

    public function obtenirEcole(int $id)
    {
        $ecole = ecole::findOrFail($id);

        return $ecole;
    }

    public function mettreAJourEcole(int $id, array $data)
    {
        $ecole = Ecole::findOrFail($id);
        $ecole -> update($data);
        
        return $ecole;
    }

    public function supprimerEcole(int $id)
    {
        $ecole = Ecole::findOrFail($id);
        $ecole->delete();

        return $ecole;
    }

}

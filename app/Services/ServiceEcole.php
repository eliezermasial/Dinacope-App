<?php
namespace App\Services;

use App\Models\Ecole;
use App\Contracts\EcoleServiceInterface;

class ServiceEcole implements EcoleServiceInterface
{
    public function creetEcole(array $data)
    {
        $ecole = Ecole::create();
        $ecole->save();

        return response()->json($ecole);
    }

    public function afficherEcoles()
    {
        $ecoles = Ecole::orderBy('created_at', 'desc')->get();

        return response()->json($ecoles);
    }

    public function obtenirEcole(int $id)
    {
        $ecole = ecole::findOrFail($id)->get();

        return response()->json($ecole);
    }

    public function mettreAJourEcole(int $id, array $data)
    {
        $ecole = Ecole::findOrFail($id)->get();
        $ecole->update($data);
        
        return response()->json($ecole);
    }

    public function supprimerEcole(int $id)
    {
        $ecole = Ecole::findOrFail($id)->get;

        return dd($ecole->delete());
    }

}

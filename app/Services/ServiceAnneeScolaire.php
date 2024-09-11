<?php
namespace App\Services;

use App\Models\AnneesScolaire;
use App\Contracts\AnneeScolaireServiceInterface;

class ServiceAnneeScolaire implements AnneeScolaireServiceInterface
{
    public function creatAgent (array $data)
    {
        $schooYear = AnneesScolaire::create($data);
        $schooYear->save();
        
        return response()->json($schooYear);
    }

    public function obtenirAnneeScolaire (int $id)
    {
        $schooYear = AnneesScolaire::findOrFail($id);

        return response()->json($schooYear);
    }

    public function mettreAJourEcole (int $id, array $data)
    {
        $schooYear = AnneesScolaire::findOrFail($id);
        $schooYear->update($data);

        return response()->json($schooYear);
    }

    public function supprimerEcole (int $id)
    {
        $schooYear = AnneesScolaire::findOrFail($id);

        return dd($schooYear->delete());
    }

}
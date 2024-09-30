<?php
namespace App\Services;

use App\Models\ChefsEtablissement;
use App\Contracts\ChefsEtablissementServiceInterface;

class ServiceChefsEtablissement implements ChefsEtablissementServiceInterface
{
    public function creatChefEtablissement (array $data)
    {
        $chef = ChefsEtablissement::create($data);
        $chef->save();

        return response()->json($chef);
    }

    public function obtenirChefEtablissamen (int $id)
    {
        $chef = ChefsEtablissement::findOrFail($id);

        return response()->json($chef);
    }

    public function mettreAJourChefEtablissement (int $id, array $data)
    {
        $chef = ChefsEtablissement::findOrFail($id);
        $chef->update($data);

        return response()->json($chef);
    }

    public function supprimerChefEtablissement (int $id)
    {
        $chef = ChefsEtablissement::findOrFail($id);
        
        return dd($chef->delete());
    }
}
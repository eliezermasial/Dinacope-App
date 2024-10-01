<?php
namespace App\Services;

use \App\Models\ChefBattement;
use \App\Contracts\ChefBattementServiceInterface;

class ServiceChefBattement implements ChefBattementServiceInterface
{
    public function creatChefBattement (array $data)
    {
        $chef = ChefBattement::create($data);

        return $chef;
    }
    
    public function obtenirChefBattement (int $id)
    {
        $chef = ChefBattement::findOrFail($id);

        return $chef;
    }

    public function mettreAJourChefBattement (int $id, array $data)
    {
        
        $chef = ChefBattement::findOrFail($id);
        $chef->update($data);

        return $chef;
    }

    public function supprimerChef (int $id)
    {
        $chef = ChefBattement::findOrFail($id);
        $chef->delete();

        return $chef;
    }
}
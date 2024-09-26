<?php
namespace App\Services;

use App\Models\Eleve;
use App\Contracts\ElevesServiceInterface;

class ServiceEleve implements ElevesServiceInterface
{
    public function creatEleve (array $data)
    {
        $eleve = Eleve::create($data);
        return $eleve;
    }

    public function obtenirEleve($id)
    {
        $eleve = Eleve::findOrFail($id);

        return $eleve;
    }

    public function mettreAJourEleve (int $id, array $data)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve -> update($data);

        return $eleve;
    }

    public function supprimerEleve(int $id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();
        
        return $eleve;
    }

}
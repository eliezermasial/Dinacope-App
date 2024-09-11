<?php
namespace App\Services;

use App\Models\Eleve;
use App\Contracts\EleveServiceInterface;

class ServiceEleve implements EleveServiceInterface
{
    public function creatEleve (array $data)
    {
        $eleve = Eleve::create($data);
        $eleve->save();

        return response()->json($eleve);
    }

    public function obtenirEleve($id)
    {
        $eleve = Eleve::findOrFail($id)->get();

        return response()->json($eleve);
    }

    public function mettreAJourEleve (int $id, array $data)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve -> update($data);

        return response()->json($eleve);
    }

    public function supprimerEleve(int $id)
    {
        $eleve = Eleve::findOrFail($id);
        
        dd( $eleve->delete());
    }

}
<?php
namespace App\Services;

use App\Models\Eleve;
use App\Contracts\EleveServiceInterface;

class ServiceEleve implements EleveServiceInterface
{
    public function creatEleve (array $data)
    {
        $save_eleve = Eleve::create($data);

        return dd($save_eleve->save());
    }

    public function obtenirEleve()
    {
        return Eleve::orderBy('created_at', 'desc')->get();
    }

}
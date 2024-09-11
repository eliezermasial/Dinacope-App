<?php
namespace App\Services;

use App\Models\Antenne;
use App\Contracts\AntenneServiceInterface;

class ServiceAntenne implements AntenneServiceInterface
{
    public function creetAntenne (array $data)
    {
        $antenne = Antenne::create($data);
        $antenne->save();
        
        return response()->json($antenne);
    }

    public function obtenirAntenne(int $id)
    {
        $antenne = Antenne::findOrFail($id);

        return response()->json($antenne);
    }

    public function mettreAJourAntenne (int $id, array $data)
    {
        $antenne = Antenne::findOrFail($id);
        $antenne->update($data);

        return response()->json($antenne);
    }

}
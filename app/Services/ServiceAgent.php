<?php
namespace App\Services;

use App\Models\AgentAntenne;
use App\Contracts\AgentServiceInterface;

class ServiceAgent implements AgentServiceInterface
{
    public function creatAgent (array $data)
    {
        $agent = AgentAntenne::create($data);

        return $agent;
    }

    public function obtenirAgent (int $id)
    {
        $agent = AgentAntenne::findOrfail($id)->get;

        return response()->json($agent);
    }

    
    public function mettreAJourAgent(int $id, array $data)
    {
        $AgentAntenne = AgentAntenne::findOrFail($id)->get;

        $AgentAntenne->update($data);

        return response()->json($AgentAntenne);
    }

    public function supprimerAgent(int $id)
    {
        $agent = AgentAntenne::findOrFail($id);
        $agent->delete();

        return $agent;
    }

}
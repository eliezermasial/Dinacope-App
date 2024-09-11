<?php
namespace App\Services;

use App\Models\Agent;
use App\Contracts\AgentServiceInterface;

class ServiceEcole implements AgentServiceInterface
{
    public function creatAgent (array $data)
    {
        $agent = Agent::create($data);

        return $agent->save();
    }

    public function obtenirAgent (int $id)
    {
        $agent = Agent::findOrfail($id)->get;

        return response()->json($agent);
    }

    public function mettreAJourEcole(int $id, array $data)
    {
        $agent = Agent::findOrFail($id)->get;

        $agent->update($data);

        return response()->json($agent);
    }

    public function supprimerEcole(int $id)
    {
        $agent = Agent::findOrFail($id)->get;

        return dd($agent->delete());
    }

}
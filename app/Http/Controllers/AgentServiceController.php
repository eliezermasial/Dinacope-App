<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AgentServiceInterface;

class AgentServiceController extends Controller
{
    public function executeAgent (AgentServiceInterface $agent)
    {
        $data = [];
        $agent->creatAgent($data);

        return response()->json($agent);
    }

    public function getAgent (AgentServiceInterface $agent)
    {
        $id = 1;
        $agent->obtenirAgent($id);

        return $agent;
    }

    public function editAgent (AgentServiceInterface $agent)
    {
        $id = 1;
        $data = [];
        $agent->mettreAJourEcole($id, $data);

        return $agent;
    }

    public function deleteAgent (AgentServiceInterface $agent)
    {
        $id = 1;
        $agent->supprimerEcole($id);

        return $agent;
    }
}

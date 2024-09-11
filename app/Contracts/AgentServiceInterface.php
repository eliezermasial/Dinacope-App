<?php

namespace App\Contracts;

interface AgentServiceInterface
{
    public function obtenirAgent(int $id);

    public function supprimerEcole(int $id);

    public function creatAgent (array $data);
    
    public function mettreAJourEcole(int $id, array $data);
}

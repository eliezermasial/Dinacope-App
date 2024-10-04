<?php

namespace App\Contracts;

interface AgentServiceInterface
{
    public function obtenirAgent(int $id);

    public function supprimerAgent(int $id);

    public function creatAgent (array $data);
    
    public function mettreAJourAgent(int $id, array $data);
}

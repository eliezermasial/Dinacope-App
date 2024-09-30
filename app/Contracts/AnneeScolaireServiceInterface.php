<?php

namespace App\Contracts;

interface AnneeScolaireServiceInterface
{
    public function supprimerEcole(int $id);

    public function creatAgent (array $data);

    public function obtenirAnneeScolaire(int $id);
    
    public function mettreAJourEcole(int $id, array $data);
}


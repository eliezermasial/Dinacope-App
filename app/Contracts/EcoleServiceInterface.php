<?php

namespace App\Contracts;

interface EcoleServiceInterface
{
    public function afficherEcoles();

    public function obtenirEcole(int $id);

    public function supprimerEcole(int $id);

    public function creetEcole(array $data);
    
    public function mettreAJourEcole(int $id, array $data);
}

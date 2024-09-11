<?php
namespace App\Contracts;

interface AntenneServiceInterface
{
    public function obtenirAntenne (int $id);

    public function creetAntenne (array $data);
    
    public function mettreAJourAntenne (int $id, array $data);
}
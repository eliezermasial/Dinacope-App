<?php
namespace App\Contracts;

interface EleveServiceInterface
{
    public function creatEleve (array $data);
    
    public function obtenirEleve($id);

    public function mettreAJourEleve(int $id, array $data);

    public function supprimerEleve(int $id);

}
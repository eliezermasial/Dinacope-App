<?php
namespace App\Contracts;


interface ChefsEtablissementServiceInterface
{
    public function obtenirChefEtablissamen (int $id);
    public function creatChefEtablissement (array $data);
    public function mettreAJourChefEtablissement (int $id, array $data);
    /*
    

    public function supprimerEleve(int $id);

    
    
    
    */
}
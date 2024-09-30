<?php
namespace App\Contracts;


interface ChefBattementServiceInterface
{
    public function obtenirChefBattement (int $id);
    public function creatChefBattement (array $data);
    public function mettreAJourChefBattement (int $id, array $data);
}
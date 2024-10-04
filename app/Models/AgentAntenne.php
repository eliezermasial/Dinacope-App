<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AgentAntenne extends Authenticatable
{
    use Notifiable;

    // Assurez-vous que votre table est correctement définie
    protected $table = 'agent_antennes';

    // Liste des attributs modifiables
    protected $fillable = [
        // Les colonnes nécessaires
        'nom',
        'email',
        'password',
        'prenom',
        'nom_antenne',
        'phone',
        'role'   
    ];

    // Ajoutez des colonnes masquées (optionnel)
    protected $hidden = [
        'password', 'remember_token',
    ];
}


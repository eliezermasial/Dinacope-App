<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChefBattement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom_chef',
        'email_chef',
        'prenom_chef',
        'ecole_id'
    ];

    public function ecole(): BelongsTo
    {
        return $this->BelongsTo(Ecole::class, 'ecole_id');
    }
}

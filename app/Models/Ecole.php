<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ecole extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phone',
        'adresse',
        'nom_ecole'
    ];

    public function chefBattement (): HasOne
    {
        return $this->HasOne(ChefBattement::class, 'ecole_id');
    }

    public function eleves (): HasMany
    {
        return $this->hasMany(Eleve::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ecole extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phone',
        'adresse',
        'nom_ecole',
        'chef_etablissement_id'
    ];

    protected function ChefsEtablissement (): BelongsTo
    {
        return $this->belongsTo(ChefsEtablissement::class);
    }

    public function eleves (): HasMany
    {
        return $this->hasMany(Eleve::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eleve extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'classe',
        'prenom',
        'ecole_id',
        'agent_id',
        'date_naissance',
        'annee_scolaire_id',
    ];

    protected function ecole (): BelongsTo
    {
        return $this->belongsTo(ecole::class);
    }

    protected function agent (): BelongsTo
    {
        return $this->belongsTo(agent::class);
    }

    protected function AnneesScolaire (): BelongsTo
    {
        return $this->belongsTo(AnneesScolaire::class);
    }
}

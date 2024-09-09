<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable= [
        'nom',
        'role',
        'phone',
        'prenom',
        'post_nom',
        'antenne_id'
    ];

    protected function antenne(): BelongsTo
    {
        return $this->belongsTo(antenne::class);
    }

    public function eleve (): HasMany
    {
        return $this->hasMany(eleve::class);
    }
}

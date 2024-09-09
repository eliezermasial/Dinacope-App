<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antenne extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom_antenne',
        'localisation'
    ];

    public function agent(): Hasmany
    {
        return $this->hasMany(agent::class);
    }
}

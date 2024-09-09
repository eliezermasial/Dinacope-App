<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChefsEtablissement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'email',
        'phone',
        'prenom',
        'post_nom',
    ];

    public function ecole(): HasOne
    {
        return $this->hasOne(ecole::class);
    }
}

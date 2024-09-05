<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reglement extends Model
{
    use HasFactory;

    public function contrat() :BelongsTo {
        return $this->belongsTo(Contrat::class);
    }

    public function detailReglement():hasMany {
        return $this->hasMany(DetailReglement::class);
    }
}

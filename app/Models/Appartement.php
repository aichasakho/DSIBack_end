<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appartement extends Model
{
    use HasFactory;

    public function immeuble() :BelongsTo {
        return $this->belongsTo(Immeuble::class);
    }
}

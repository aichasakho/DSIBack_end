<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contrat extends Model
{
    use HasFactory;

    public function client() :BelongsTo {
        return $this->belongsTo(Client::class);
    }


    public function prorietaire() :BelongsTo {
        return $this->belongsTo(Proprietaire::class);
    }
}

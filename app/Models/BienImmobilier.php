<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BienImmobilier extends Model
{
    use HasFactory;



    public function categorie() :BelongsTo {
   return $this->belongsTo(Categorie::class);
    }


    public function proprietaire():BelongsTo {
        return $this->belongsTo(Proprietaire::class);
    }

    public function localite():BelongsTo {
        return $this->belongsTo(Localite::class);
    }

    public function annonce():hasMany {
        return $this->hasMany(Annonce::class);
    }

    public function contrat():hasMany {
        return $this->hasMany(Contrat::class);
    }

    public function reservation():hasMany {
        return $this->hasMany(Reservation::class);
    }
}

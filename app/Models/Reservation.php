<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut', 'date_fin', 'profession', 
        'situation_matriminiale', 'client_nom'
    ];

    public function client(){
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function bien_immobilier(){
        return $this->belongsTo(BienImmobilier::class);
    }
}

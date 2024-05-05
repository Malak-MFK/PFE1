<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = ['nom', 'prenom', 'date_rapport', 'content'];

    // Relation avec le modèle Stagiaire
    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}

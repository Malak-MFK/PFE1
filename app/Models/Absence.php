<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'stagiaire_id',
        'date',
        'module',
        'seance'
        // Autres colonnes de la table d'absence
    ];

    /**
     * Get the stagiaire that owns the absence.
     */
    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class, 'stagiaire_id'); // Utilisez le nom correct de la clé étrangère
    }
}


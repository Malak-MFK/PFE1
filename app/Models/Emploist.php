<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploist extends Model
{
    use HasFactory;

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
}

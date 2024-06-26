<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'lastname', 'cef', 'num_inscription', 'date_naissance','groupe','date_inscription', 'image'
    ];
}

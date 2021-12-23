<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriquesRenvezVou extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPatient',
        'idMedecin',
        'datePrendreRV',
        'dateRendezVous',
    ];
}

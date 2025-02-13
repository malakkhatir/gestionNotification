<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutBesoin extends Model
{
    use HasFactory;

    protected $table = 'statutbesoin'; // Nom de la table

    protected $fillable = [
        'description',
    ];

    // Un statut peut être lié à plusieurs besoins
    public function besoins()
    {
        return $this->hasMany(Besoin::class, 'idStatut');
   }
}
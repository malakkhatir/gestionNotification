<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    use HasFactory;

    protected $table = 'marche'; 

    protected $fillable = [
        'nomMarche',
        'dateDebut',
        'dateExp',
        'statut',
    ];

    // Relation m3a Besoin (Un marché peut avoir plusieurs besoins)
    public function besoins()
    {
        return $this->hasMany(Besoin::class, 'idMarche');
    }
}


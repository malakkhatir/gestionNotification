<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besoin extends Model
{
    use HasFactory;

    protected $table = 'besoin'; // Nom de la table dans la base de données
    protected $primaryKey = 'ref';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'ref',
        'date', 
        'idMarche',       
        'idStatut',  
        'iduser',    
    ];
    // Relation avec le marché
    public function marche()
    {
        return $this->belongsTo(Marche::class, 'idMarche');
    }
    // Relation avec l'utilisateur (si tu as une table users)
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
    // Relation avec le statut du besoin (si tu as une table "statut")
    public function statut()
    {
        return $this->belongsTo(StatutBesoin::class, 'idStatut');
    }
}
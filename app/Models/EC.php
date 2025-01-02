<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EC extends Model
{
    use HasFactory;

    // Spécification des colonnes autorisées pour l'insertion
    protected $fillable = [
        'nom',
        'coefficient',
        'ue_id' ,
        'code'// Colonne de clé étrangère
    ];

    // Spécification explicite de la table (si nécessaire)
    protected $table = 'elements_constitutifs';

    // Définir la relation avec l'UE (s'assurer que 'ue_id' est bien la clé étrangère)
    public function setCodeAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['code'] = 'DEFAULT_CODE';  // Valeur par défaut
        } else {
            $this->attributes['code'] = $value;
        }
    }
}

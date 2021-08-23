<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $libelle_court
 * @property string $libelle_long
 * @property string $description
 * @property Groupement $groupement
 * @property Collection $type_vehicules
 */
class Centre extends Model
{
    use HasFactory;

    protected $fillable = ['libelle_court', 'libelle_long', 'description'];

    public function groupement()
    {
        return $this->belongsTo(Groupement::class);
    }

    public function type_vehicules()
    {
        return $this->belongsToMany(TypeVehicule::class);
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
}

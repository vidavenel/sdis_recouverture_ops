<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Type de vehicule SP
 * @property-read int $id
 * @property string $libelle
 * @property Collection $competences
 */
class TypeVehicule extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }
}

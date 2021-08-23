<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property Grade $grade
 * @property Collection $competences
 */
class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['matricule', 'nom', 'prenom'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }
}

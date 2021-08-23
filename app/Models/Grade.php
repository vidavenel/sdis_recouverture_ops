<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $libelle_court
 * @property string $libelle_long
 * @property string $description
 */
class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['libelle_court', 'libelle_long', 'description'];

    public function agents()
    {
        $this->hasMany(Agent::class);
    }
}

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
 * @property Collection $centres
 */
class Groupement extends Model
{
    use HasFactory;

    protected $fillable = ['libelle_court', 'libelle_long', 'description'];

    public function centres()
    {
        return $this->hasMany(Centre::class);
    }
}

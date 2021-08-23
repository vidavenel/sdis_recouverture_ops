<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Competence SP correspondant à une UV
 * @property-read int $id
 * @property string $libelle
 * @property string $description
 */
class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'description'];
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $insee
 * @property string $nom
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class Commune extends Model
{
    use HasFactory;

    protected $fillable = ['insee', 'nom'];
}

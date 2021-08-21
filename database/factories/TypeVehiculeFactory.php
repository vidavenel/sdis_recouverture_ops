<?php

namespace Database\Factories;

use App\Models\TypeVehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeVehiculeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeVehicule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->word
        ];
    }
}

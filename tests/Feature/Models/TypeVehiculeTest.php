<?php

namespace Tests\Feature\Models;

use App\Models\Competence;
use App\Models\TypeVehicule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class TypeVehiculeTest extends TestCase
{
    use RefreshDatabase;

    public function test_factory()
    {
        TypeVehicule::factory()->count(50)->create();
        $this->assertDatabaseCount('type_vehicules', 50);
    }

    public function testCreateTypeVehicule()
    {
        $_type_vehicule = TypeVehicule::factory()->makeOne()->toArray();
        TypeVehicule::create($_type_vehicule);
        $this->assertDatabaseCount('type_vehicules', 1);
    }

    public function test_set_competences()
    {
        /** @var TypeVehicule $typeVehicule */
        $typeVehicule = TypeVehicule::factory()->create();
        /** @var Collection $_competences */
        $_competences = Competence::factory()->count(50)->create();

        $typeVehicule->competences()->attach($_competences->take(5)->pluck('id')->all());

        $_competences->take(5)->each(function (Competence $_comp) use ($typeVehicule) {
            $this->assertDatabaseHas('competence_type_vehicule', [
                'type_vehicule_id' => $typeVehicule->id,
                'competence_id' => $_comp->id
            ]);
        });

    }
}

<?php

namespace Tests\Feature\Models;

use App\Models\Centre;
use App\Models\TypeVehicule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class CentreTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_centre()
    {
        $_centre = Centre::factory()->makeOne()->toArray();
        Centre::create($_centre);
        $this->assertDatabaseCount('centres', 1);
    }

    public function test_add_vehicule()
    {
        /** @var Collection $_vehicules */
        $_vehicules = TypeVehicule::factory()->count(5)->create();

        /** @var Centre $_centre */
        $_centre = Centre::factory()->create();

        $_centre->type_vehicules()->attach($_vehicules->first());

        $this->assertDatabaseHas('centre_type_vehicule', [
            'centre_id' => $_centre->id,
            'type_vehicule_id' => $_vehicules->first()->id
        ]);
    }

    public function test_add_vehicules()
    {
        /** @var Collection $_vehicules */
        $_vehicules = TypeVehicule::factory()->count(5)->create();

        /** @var Centre $_centre */
        $_centre = Centre::factory()->create();

        $_centre->type_vehicules()->attach($_vehicules->first(), ['nombre' => 3]);

        $this->assertDatabaseHas('centre_type_vehicule', [
            'centre_id' => $_centre->id,
            'type_vehicule_id' => $_vehicules->first()->id,
            'nombre' => 3
        ]);
    }
}

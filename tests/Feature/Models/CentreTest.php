<?php

namespace Tests\Feature\Models;

use App\Models\Agent;
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

    public function test_add_agent()
    {
        /** @var Centre $_centre */
        $_centre = Centre::factory()->create();
        /** @var Collection $_agents */
        $_agents = Agent::factory()->count(100)->create();

        $_centre->agents()->attach($_agents->get(12));
        $_centre->agents()->attach($_agents->get(52));
        $_centre->agents()->attach($_agents->get(71));
        $_centre->agents()->attach($_agents->get(98));

        $this->assertDatabaseHas('agent_centre', [
            'centre_id' => $_centre->id,
            'agent_id' => $_agents->get(12)->id
        ]);
    }
}

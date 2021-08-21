<?php

namespace Tests\Feature\Models;

use App\Models\TypeVehicule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}

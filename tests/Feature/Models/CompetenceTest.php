<?php

namespace Tests\Feature\Models;

use App\Models\Competence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompetenceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_factory()
    {
        Competence::factory()->count(100)->create();

        $this->assertDatabaseCount('competences', 100);
    }
}

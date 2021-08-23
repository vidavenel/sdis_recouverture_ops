<?php

namespace Tests\Feature\Models;

use App\Models\Agent;
use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AgentTest extends TestCase
{
    use RefreshDatabase;

    public function test_factory()
    {
        Agent::factory()->create();
        $this->assertDatabaseCount('agents', 1);
    }

    public function test_set_grade()
    {
        /** @var Agent $_agent */
        $_agent = Agent::factory()->create();
        $_grades = Grade::factory()->count(5)->create();

        $_agent->grade()->associate($_grades->get(2));
        $_agent->save();

        $this->assertDatabaseHas('agents', ['id' => $_agent->id, 'grade_id' => $_grades->get(2)->id]);
     }
}

<?php

namespace Tests\Feature\Models;

use App\Models\Agent;
use App\Models\Competence;
use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
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

    public function test_set_competences()
    {
        /** @var Agent $_agent */
        $_agent = Agent::factory()->create();
        /** @var Collection $_competences */
        $_competences = Competence::factory()->count(50)->create();

        $_agent->competences()->attach($_competences->take(5)->pluck('id')->all());

        $_competences->take(5)->each(function (Competence $_comp) use ($_agent) {
            $this->assertDatabaseHas('agent_competence', [
                'agent_id' => $_agent->id, 
                'competence_id' => $_comp->id
            ]);
        });

    }
}

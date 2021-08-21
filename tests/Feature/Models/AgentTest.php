<?php

namespace Tests\Feature\Models;

use App\Models\Agent;
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
}

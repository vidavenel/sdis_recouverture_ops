<?php

namespace Tests\Feature\Models;

use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GradeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_factory()
    {
        Grade::factory()->count(100)->create();
        $this->assertDatabaseCount('grades', 100);
    }
}

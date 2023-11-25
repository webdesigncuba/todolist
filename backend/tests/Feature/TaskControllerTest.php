<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    /**
     * Test to get all tasks.
     *
     * @return void
     */
    public function testGetAllTasks()
    {
        $response = $this->get('/api/tasks');

        $response->assertStatus(200);
    }

}

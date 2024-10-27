<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response -> assertStatus(200) ;
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }
}

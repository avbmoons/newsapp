<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
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
        $response = $this->get(route('admin.news.index'));

        $response -> assertStatus(200) ;
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $data = [
            'title' => \fake()->jobTitle(),
            'author' => \fake()->userName(),  
            'description' => \fake()->text(100),                      
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertStatus(200)
        ->json($data);
    }

    public function testValidateTitleData(): void
    {
        $data = [            
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
        ];
        $response = $this->post(route('admin.news.store'), $data);

        //$response->assertStatus(422);
        $response->assertRedirect('http://localhost');
    }
    
}

<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        Category::factory()->count(3)->create();

        $response = $this->get('/categories');

        $response->assertStatus(200);

        $response->assertViewIs('categories');

        $response->assertViewHas('categories');
    }

    public function testCreate()
    {
        $response = $this->get('/categories/create');

        $response->assertStatus(200);

        $response->assertViewIs('category_create');
    }

    public function testStore()
    {
        $request = new Request([
            'name' => 'Test Category',
        ]);

        $response = $this->post('/categories', $request->toArray());

        $response->assertStatus(302);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
        ]);
    }

}

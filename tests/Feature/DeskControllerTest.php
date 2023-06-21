<?php

namespace Tests\Unit\Http\Controllers;


use App\Models\Desk;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class DeskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        //Create a sample desk
        Desk::factory()->count(3)->create();

        //Send a GET request to '/'
        $response = $this->get('/');

        //Assert that the response status code is 200
        $response->assertStatus(200);

        //Assert the name of the view
        $response->assertViewIs('index');

        //Assert that the 'desks' variable is passed to the view
        $response->assertViewHas('desks');
    }

    public function testCreate()
    {
        //Send a GET request to '/desks/create' route
        $response = $this->get('/desks/create');

        //Assert response status code is 200
        $response->assertStatus(200);

        //Assert view
        $response->assertViewIs('desk_create');
    }

    public function testStore()
    {
        //Create a mock Request
        $request = new Request([
            'name' => 'Test Desk',
            'symbol' => 'T',
            'position_x' => 10,
            'position_y' => 20,
        ]);

        //Send a POST request to '/desks' with the mock Request
        $response = $this->post('/desks', $request->toArray());

        //Response status code
        $response->assertStatus(302);

        //Redirection to '/'
        $response->assertRedirect('/');

        //Desk was created in the database
        $this->assertDatabaseHas('desks', [
            'name' => 'Test Desk',
            'symbol' => 'T',
            'position_x' => 10,
            'position_y' => 20,
        ]);
    }

    public function testEdit()
    {
        //Create a desk
        $desk = Desk::factory()->create();

        //Send a GET request to '/desks/{id}/edit' with desk ID
        $response = $this->get(route('desks.edit', $desk->id));

        //Response status code
        $response->assertStatus(200);

        //Check view name
        $response->assertViewIs('desk_edit');

        //Assert the 'desk' variable is passed to the view
        $response->assertViewHas('desk');
    }

    public function testUpdate()
    {
        //Create a desk
        $desk = Desk::factory()->create();

        // Create a mock Request object
        $request = new Request([
            'position_x' => 30,
            'position_y' => 40,
            'height' => 100,
            'width' => 200,
        ]);

        //Send PUT request to '/desks/{desk}'
        $response = $this->put(route('desks.update', $desk->id), $request->toArray());

        // Assert response is a JsonResponse
        $response->assertJson(['message' => 'Desk updated successfully']);

        //Assert that the Desk was updated in the database
        $this->assertDatabaseHas('desks', [
            'id' => $desk->id,
            'position_x' => 30,
            'position_y' => 40,
            'height' => 100,
            'width' => 200,
        ]);
    }

    public function testPatch()
    {
        //Create a desk
        $desk = Desk::factory()->create();

        //Create a mock Request object
        $request = new Request([
            'name' => 'Updated Desk',
            'symbol' => 'U',
        ]);

        //Send PATCH request to '/desks/{desk}'
        $response = $this->patch(route('desks.patch', $desk->id), $request->toArray());

        //Assert response content
        $response->assertRedirect('/');

        //Assert that the Desk was updated in the database
        $this->assertDatabaseHas('desks', [
            'id' => $desk->id,
            'name' => 'Updated Desk',
            'symbol' => 'U',
        ]);
    }

    public function testDestroy()
    {
        //Create a desk
        $desk = Desk::factory()->create();

        //Send DELETE request to '/desks/{id}'
        $response = $this->delete(route('desks.destroy', $desk->id));

        //Assert response content
        $response->assertRedirect('/');

        //Assert that the Desk was deleted from the database
        $this->assertDatabaseMissing('desks', ['id' => $desk->id]);
    }

}

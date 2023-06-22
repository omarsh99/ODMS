<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);

        $response->assertViewIs('auth.login');
    }

    public function testLoginUser()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $request = new Request([
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response = $this->post('/login', $request->toArray());

        $response->assertStatus(302);

        $response->assertRedirect('/');

        $this->assertEquals($user->id, Session::get('loginId'));
    }

    public function testRegister()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);

        $response->assertViewIs('auth.register');
    }

    public function testRegisterUser()
    {
        $request = new Request([
            'name' => 'Omar Shehabi',
            'email' => 'omar@example.com',
            'password' => 'password',
        ]);

        $response = $this->post('/register', $request->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => 'Omar Shehabi',
            'email' => 'omar@example.com',
        ]);
    }

    public function testLogout()
    {
        Session::put('loginId', 1);

        $response = $this->get('/logout');

        $response->assertStatus(302);

        $response->assertRedirect('/');

        $this->assertNull(Session::get('loginId'));
    }
}

<?php

namespace Test\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AuthenticationTest extends Testcase {

    use RefreshDatabase;

    public function testUserCanRegister() {
        $response = $this->post('/signup', [
            'dni' => '12345678A',
            'name' => 'John',
            'surname' => 'Doe Martin',
            'email' => 'johndoe@gmail.com',
            'pass' => 'John1234_',
            'pass_confirmation' => 'John1234_',
            'phone' => '987654321',
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('users', ['email' => 'johndoe@gmail.com']);
    }


    public function textShowLoginForm() {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testUserCanLogin() {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'pass' => 'password',
        ]);

        $response->assertRedirect('/');
    }

    public function testUserCanLogout() {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/logout');
        $response->assertRedirect('/');
    }

   public function testUserCanCreateProperty() {
       $user = User::factory()->create();
       $response = $this->actingAs($user)->post('/createProperty', [
           'description' => 'Casa con 3 habitaciones y 2 baños',
           'price' => 1000,
           'city' => 'Barcelona',
           'address' => 'Calle Falsa 123',
           'dni_landlord' => $user->dni,
       ]);

       $response->assertStatus(302);
   }


}
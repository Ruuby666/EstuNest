<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PropertyControllerTest extends TestCase
{


    public function testIndex()
    {
        $response = $this->get('/catalog');
        $response->assertStatus(200);
    }

    public function testCreatePropertyWithRegisterUser() {
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

    public function testCreatePropertyWithoutRegisterUser() {
        $response = $this->post('/createProperty', [
            'description' => 'Casa con 3 habitaciones y 2 baños',
            'price' => 1000,
            'city' => 'Barcelona',
            'address' => 'Calle Falsa 123',
            'dni_landlord' => '12345678A',
        ]);
        $response->assertStatus(302);
    }

    
    public function testEditProperty()
    {
        $user = User::factory()->create();
        $property = Property::factory()->create();
        $response = $this->actingAs($user)->get('/userProperties/' . $property->id . '/edit');
        $response->assertStatus(200);
    }


    public function testDeleteProperty()
    {
        $user = User::factory()->create();
        $property = Property::factory()->create();
        $response = $this->actingAs($user)->delete('/userProperties/' . $property->id);
        $response->assertStatus(302);
    }



    
}
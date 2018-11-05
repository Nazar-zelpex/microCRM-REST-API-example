<?php

namespace Tests\Feature;

use App\Client;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    public function testCanGetOneClient()
    {
        $client = factory(Client::class)->create([
            'first_name' => 'Nazar',
            'last_name'  => 'Nazar',
            'email'      => 'nazar@gmail.com',
        ]);

        $this->json('GET', '/api/clients/'.$client->id, [])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'first_name',
                'last_name',
                'email',
                'created_at',
                'updated_at',
            ])
            ->assertJson([
                'id'         => $client->id,
                'first_name' => 'Nazar',
                'last_name'  => 'Nazar',
                'email'      => 'nazar@gmail.com',
            ]);
    }

    public function testCanGetAllClients()
    {
        $client1 = [
            'first_name' => 'Nazar',
            'last_name' => 'Boyko',
            'email' => 'nazar@gmail.com',
        ];
        $client2 = [
            'first_name' => 'Nazar',
            'last_name' => 'Boyko',
            'email' => 'admin@gmail.com',
        ];

        factory(Client::class)->create($client1);
        factory(Client::class)->create($client2);

        $this->json('GET', '/api/clients', [])
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
            ])
            ->assertJson([$client1, $client2]);
    }

    public function testCanCreateClient()
    {
        $client = [
            'first_name' => 'Nazar',
            'last_name' => 'Boyko',
            'email' => 'nazar@gmail.com',
            'password' => '123456789',
        ];

        $this->json('POST', '/api/client', $client)
            ->assertStatus(201)
            ->assertJson([
                'first_name' => 'Nazar',
                'last_name' => 'Boyko',
                'email' => 'nazar@gmail.com',
            ]);
    }

    public function testCanDeleteClient()
    {
        $client = factory(Client::class)->create();
        $this->json('DELETE', '/api/client/' . $client->id, [])
            ->assertStatus(204);
    }
}

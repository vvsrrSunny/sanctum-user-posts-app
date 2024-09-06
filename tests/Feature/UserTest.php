<?php

// tests/Feature/LoginFeatureTest.php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Use the RefreshDatabase trait to reset the database after each test
uses(RefreshDatabase::class);

it('unauthenticated user fails to view any specific user', function () {
    // Create a user
    User::factory()->create();

    // Attempt to log fails
    $response = $this
        ->getJson(
            route('users.show', ['user' => 1])
        )
        ->assertStatus(401);
});

it('Authenticated user Successfully able to see specific user', function () {
    // Create a user
    $userOne = User::factory()->create();

    $userTwo = User::factory()->create([
        'name' => 'sunnyTwo',
        'email' => 'sunnytwo@example.com'
    ]);

    // Attempt to log in with the correct credentials
    $response = $this
        ->actingAs($userOne)
        ->getJson(
            route('users.show', ['user' => $userTwo])
        )
        ->assertStatus(200)
        ->assertJson([
            'message' => 'User record found',
            'user' => [
                'id' => $userTwo->id,
                'name' => $userTwo->name,
                'email' => $userTwo->email,
            ],
        ]);
});

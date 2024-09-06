<?php

// tests/Feature/LoginFeatureTest.php
namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Use the RefreshDatabase trait to reset the database after each test
uses(RefreshDatabase::class);

it('allows authorized user to delete a post', function () {
    // Create a user
    $userOne = User::factory() // Create 3 posts for the user
        ->create();
    $post = Post::factory()->create(['user_id' => $userOne->id]);

    $response = $this
        ->actingAs($userOne)
        ->deleteJson(
            route('posts.destroy', ['post' => $post])
        )
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Post deleted successfully',
            'post' => [
                'id' => $post->id,
            ],
        ]);

    expect(Post::count())->toBe(0);
});

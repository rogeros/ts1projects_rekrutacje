<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Article;

class ArticleManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a guest cannot create an article.
     */
    public function test_guest_cannot_create_article()
    {
        $response = $this->post('/article', []);
        $response->assertRedirect('/login');
    }

    /**
     * Test that an authenticated user can create an article.
     */
    public function test_authenticated_user_can_create_article()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/article', [
            'title' => 'Test Article',
            'body' => 'This is a test article body.',
            'publication_date' => now()->format('Y-m-d H:i:s'),
        ]);

        $response->assertRedirect('');
        $this->assertDatabaseHas('articles', [
            'title' => 'Test Article',
            'body' => 'This is a test article body.',
        ]);
    }

    /**
     * Test that an article can be updated by its author.
     */
    public function test_author_can_update_article()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $article = Article::factory()->create(['user_id' => $user->id]);

        $response = $this->put("/article/{$article->id}", [
            'title' => 'Updated Title',
            'body' => 'Updated body.',
            'publication_date' => now()->format('Y-m-d H:i:s'),
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => 'Updated Title',
            'body' => 'Updated body.',
        ]);
    }

    /**
     * Test that an author can delete their own article.
     */
    public function test_author_can_delete_article()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $article = Article::factory()->create(['user_id' => $user->id]);

        $response = $this->delete("/article/{$article->id}");

        $response->assertRedirect('/');
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

}

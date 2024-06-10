<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_view_a_posts_listing(): void
    {
        $posts = Post::factory()->count(2)->create();
        $this->getJson("/api/posts")->assertStatus(200);
    }

    #[Test]
    public function user_can_view_a_post(): void
    {
        $post = Post::factory()->create();

        $response = $this->getJson("/api/posts/{$post->id}");

        $response->assertStatus(200)->assertJson(
            fn(AssertableJson $json) => $json
                ->where("id", $post->id)
                ->where("title", $post->title)
                ->etc()
        );
    }

    #[Test]
    public function user_see_a_404_when_attemting_to_view_a_post_that_does_not_exists(): void
    {
        $post = Post::factory()->create();
        $notExistsId = "notExistsId";

        $this->getJson("/api/posts/{$notExistsId}")->assertStatus(
            Response::HTTP_NOT_FOUND
        );
    }

    #[Test]
    public function user_can_create_a_post(): void
    {
        $this->withoutExceptionHandling();
        $post = Post::factory()->make();

        $this->postJson("/api/posts", [
            "title" => "title",
            "body" => "body",
        ])
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) => $json
                    ->where("title", "title")
                    ->where("body", "body")
                    ->where("slug", "title")
                    ->etc()
            );
    }

    #[Test]
    public function user_can_remove_a_post(): void
    {
        $post = Post::factory()->create();

        $this->deleteJson("/api/posts/{$post->id}")->assertStatus(204);
    }

    #[Test]
    public function title_is_required(): void
    {
        $response = $this->postJson("/api/posts", [
            "body" => "body",
        ]);

        $response
            ->assertStatus(422)
            ->assertInvalid(["title" => "The title field is required."]);
    }

    #[Test]
    public function body_is_required(): void
    {
        $response = $this->postJson("/api/posts", [
            "title" => "title",
        ]);

        $response
            ->assertStatus(422)
            ->assertInvalid(["body" => "The body field is required."]);
    }
}

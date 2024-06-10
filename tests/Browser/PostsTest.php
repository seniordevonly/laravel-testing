<?php

namespace Tests\Browser;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostsTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testUuserCanViewAPostInPostsListing(): void
    {
        $post = Post::factory()->create();
        $this->browse(
            fn(Browser $browser) => $browser
                ->visit("/posts")
                ->screenshot("test")
                ->with("[data-post]", function ($el) use ($post) {
                    $el->assertSee($post->title);
                }),
        );
    }
}

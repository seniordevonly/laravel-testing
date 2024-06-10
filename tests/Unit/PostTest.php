<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PostTest extends TestCase
{
    #[Test]
    public function post_can_be_published(): void
    {
        $post = Post::factory()->published()->make();
        $this->assertTrue($post->isPublished());
    }
}

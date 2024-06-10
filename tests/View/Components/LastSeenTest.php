<?php

namespace Tests\View\Components;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LastSeenTest extends TestCase
{
    #[Test]
    public function last_seen()
    {
        $post = Post::factory()->create();

        $this->travelTo(Carbon::make("2024-01-01"));

        $this->blade('<x-last-seen :post="$post" />', ["post" => $post])
            ->assertDontSee("Last seen")
            ->assertDontSee("2024-01-01");

        app(Request::class)->cookies->set("last_seend_{$post->slug}", now()->toDateTimeString());

        $this->blade('<x-last-seen :post="$post" />', ["post" => $post])
            ->assertDontSee("Last seen")
            ->assertDontSee("2024-01-01");
    }
}

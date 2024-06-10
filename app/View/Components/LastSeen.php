<?php
namespace App\View\Components;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

class LastSeen extends Component
{
    private ?Carbon $lastSeen;
    public function __construct(public Post $post)
    {
        $key = "last_seen_{$this->post->slug}";
        $this->lastSeen = Carbon::make(request()->cookie($key));
        Cookie::queue($key, now()->toDateTimeString());
    }

    public function render()
    {
        return view("components.last-seen", ["lastSeen" => $this->lastSeen]);
    }
}

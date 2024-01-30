<?php

namespace App\Livewire\Components;

use App\Models\Post;
use Livewire\Component;

class PostFeed extends Component
{
    public $posts;

    public function render()
    {
        return view('livewire.components.post-feed');
    }

    public function mount() {
        $this->posts = Post::all();
    }
}

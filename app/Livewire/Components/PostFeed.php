<?php

namespace App\Livewire\Components;

use App\Models\Post;
use Livewire\Component;

class PostFeed extends Component
{
    public $posts;
    public $posts_loaded = 3;

    public function render()
    {
        return view('livewire.components.post-feed');
    }

    public function load_more() {

    }

}

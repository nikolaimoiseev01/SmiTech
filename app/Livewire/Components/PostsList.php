<?php

namespace App\Livewire\Components;

use Livewire\Component;

class PostsList extends Component
{
    public $posts;
    public $posts_num;

    public function render()
    {
        return view('livewire.components.posts-list');
    }
}

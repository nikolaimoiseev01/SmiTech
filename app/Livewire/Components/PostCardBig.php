<?php

namespace App\Livewire\Components;

use Livewire\Component;

class PostCardBig extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.components.post-card-big');
    }

    public function mount() {

    }
}

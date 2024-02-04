<?php

namespace App\Livewire\Components;

use App\Models\PostType;
use App\Models\Topic;
use Livewire\Component;

class Header extends Component
{
    public $post_types;

    public function render()
    {
        return view('livewire.components.header');
    }

    public function mount() {
        $this->post_types = PostType::all();
    }
}

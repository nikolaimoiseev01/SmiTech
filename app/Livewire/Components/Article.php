<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Article extends Component
{

    public $post;
    public $post_cover;
    public function render()
    {
        return view('livewire.components.article');
    }

    public function mount() {

    }
}

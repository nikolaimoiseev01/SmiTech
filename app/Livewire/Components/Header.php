<?php

namespace App\Livewire\Components;

use App\Models\Topic;
use Livewire\Component;

class Header extends Component
{
    public $topics;

    public function render()
    {
        return view('livewire.components.header');
    }

    public function mount() {
        $this->topics = Topic::all();
    }
}

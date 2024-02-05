<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Chat')]
#[Layout('components.layouts.app')]

class Chat extends Component
{
    public function render()
    {
        return view('livewire.chat');
    }
}

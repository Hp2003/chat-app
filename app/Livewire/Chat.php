<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;
#[Title('Chat')]
#[Layout('components.layouts.app')]

class Chat extends Component
{
    public function render(User $user)
    {
        $user = $user->find(auth()->user()->id);
        $friends = $user->getFriends();

        return view('livewire.chat', compact('friends'));
    }
}

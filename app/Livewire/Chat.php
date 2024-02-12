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
    public $search;
    public $requestCount = 0;

    public function render(User $user)
    {
        $user = $user->find(auth()->user()->id);
        $friends = $user->getFriends($this->search, ['FRIENDS'])->get();
        $requestCount = $user->getFriends('', ['FRIENDS'])->count();

        return view('livewire.chat', compact('friends'));
    }
}

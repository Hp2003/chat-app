<?php

namespace App\Livewire;

use App\Models\Friend;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Chat')]
#[Layout('components.layouts.app')]
class Chat extends Component
{
    use LivewireAlert;

    public $search;
    public $requestCount = 0;

    public function render(User $user)
    {
        $user = $user->find(auth()->user()->id);
        $friends = $user->getFriends($this->search, ['FRIENDS'])->get();
        $this->requestCount = $user->getFriends('', ['PENDING'])->count();

        return view('livewire.chat', compact('friends'));
    }

    public function removeFriend($uuid)
    {
        $friends = Friend::getFriends($uuid);

        $friends[0]->delete();
        $friends[1]->delete();

        $this->alert('success', 'Friend removed successfully!');
    }

    public function getListeners()
    {
        return [

        ];
    }
}

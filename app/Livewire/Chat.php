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
    public $user ;

    public function render()
    {
        $friends = $this->user->getFriends($this->search, ['FRIENDS'])->get();
        $this->requestCount = $this->user->getFriends('', ['PENDING'])->count();

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
            "echo-private:friend-request-recived.". auth()->user()->id .",FriendRequestSent" => "showRequestPopup",
        ];
    }

    public function showRequestPopup()
    {
        // $this->requestCount += 1;
        $this->alert('success', 'A friend request recived');
    }

    public function mount(User $user)
    {
        $this->user = $user->find(auth()->user()->id);
    }
}

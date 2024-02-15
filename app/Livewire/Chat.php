<?php

namespace App\Livewire;

use App\Models\Friend;
use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;
use Illuminate\Support\Arr;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

#[Title('Chat')]
#[Layout('components.layouts.app')]
class Chat extends Component
{
    use LivewireAlert;

    public $search;
    public $requestCount = 0;
    public $user ;
    public $selectedUser ;
    public $friendRoomIds = [];
    // public $roomId = '';

    public function render()
    {
        // $this->roomId = request()->query('id');

        $friends = $this->user->getFriends($this->search, ['FRIENDS'])->get();
        $this->requestCount = $this->user->getFriends('', ['PENDING'])->count();
        $friendRoomIds  = Friend::where('user_id', auth()->user()->id)->where('status', 'FRIENDS')->get();
        $this->friendRoomIds = Arr::pluck($friendRoomIds, ['room_id']);
        $rooms = Room::where('user_id', auth()->user()->id)->get();
        // dd($rooms->get()->toArray());

        return view('livewire.chat', compact('friends', 'rooms'));
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
    #[On('userSelected')]
    public function selectUser($uuid)
    {
        $this->selectedUser = $uuid;
    }
}

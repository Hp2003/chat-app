<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\Friend;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class FriendRequestList extends Component
{
    use LivewireAlert;

    public $search;
    public function render()
    {

        $user = User::find(auth()->user()->id);
        $requests = $user->getFriends($this->search, ['PENDING'])->get();

        return view('livewire.user.friend-request-list', compact('requests'));
    }

    public function acceptRequest($uuid)
    {
        $requests = Friend::getFriends($uuid);

        $requests[0]->status = 'FRIENDS';
        $requests[1]->status = 'FRIENDS';

        $requests[0]->save();
        $requests[1]->save();

        $this->alert('success', 'Request accepted successfully!');

    }

    public function rejectRequest($uuid)
    {
        $requests = Friend::getFriends($uuid);

        $requests[0]->delete();
        $requests[1]->delete();

        $this->alert('success', 'Request rejected successfully!');

    }
}

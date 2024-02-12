<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Friend;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Friend Requests')]
#[Layout('components.layouts.app')]
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
        $request = Friend::where('uuid', $uuid)->first();
        $requester = Friend::where('user_id', $request->user_id)->first();

        $request->status = 'FRIENDS';
        $requester->status = 'FRIENDS';

        $request->save();
        $requester->save();

        $this->alert('success', 'Request accepted successfully!');

    }

    public function rejectRequest($uuid)
    {
        $request = Friend::where('uuid', $uuid)->first();
        $requester = Friend::where('user_id', $request->user_id)->first();

        $request->delete();
        $requester->delete();

        $this->alert('success', 'Request rejected successfully!');

    }
}

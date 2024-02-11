<?php

namespace App\Livewire\User;

use App\Models\Friend;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Add Friend')]
#[Layout('components.layouts.app')]
class AddFriendForm extends Component
{
    use LivewireAlert;
    public $search;

    public function render()
    {
        $user = User::find(auth()->user()->id);
        $user->getFriends($this->search);

        $users = User::when($this->search, function($query, $search){
            $query->where(DB::raw('user_name'), 'like', '%' . trim(strtolower($search)) . '%');
        })->get();

        return view('livewire.user.add-friend-form', compact('users'));
    }

    public function sendRequest($uuid)
    {
        $friend = User::where('uuid', $uuid)->first();

        $result = Friend::create(['user_id' => auth()->user()->id, 'friend_id' => $friend->id]);

        if($result){
            $this->alert('success', 'Request sent successfully!');
        }else{
            $this->alert('warning', 'Failed sending request!');
        }
    }
}

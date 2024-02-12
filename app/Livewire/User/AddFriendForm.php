<?php

namespace App\Livewire\User;

use App\Models\Friend;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


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

        $friends = $user->getFriends()->toArray();
        $friends = Arr::pluck($friends, ['id']);

        $users = User::when($this->search, function ($query, $search) {
            $query->where(DB::raw('user_name'), 'like', '%' . trim(strtolower($search)) . '%');
        })
        ->whereNotIn('id', empty($friends) ? [0] : $friends)
        ->whereNot('id', auth()->user()->id)
        ->get();

        return view('livewire.user.add-friend-form', compact('users'));
    }

    public function sendRequest($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        $result = Friend::create([
                'user_id' => auth()->user()->id,
                'friend_id' => $user->id,
                'uuid' => Str::uuid()->toString(),
                'status' => 'PENDING',
        ]);

        $result2 = Friend::create([
            'user_id' => $user->id,
            'friend_id' => auth()->user()->id,
            'uuid' => Str::uuid()->toString(),
            'status' => 'REQUESTED',
        ]);

        if ($result && $result2) {
            $this->alert('success', 'Request sent successfully!');
        } else {
            $this->alert('warning', 'Failed sending request!');
        }
    }
}

<?php

namespace App\Livewire\Room;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateRoomForm extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    #[Validate('required|image|max:10240')]
    public $photo ;
    #[Validate('required|max:100')]
    public $roomName;
    #[Validate('required|max:150')]
    public $description;

    public $search;
    public $selectedFriends = [];

    public function render()
    {
        $user = User::find(auth()->user()->id);
        $friends = $user->getFriends($this->search, ['FRIENDS'])->get();
        return view('livewire.room.create-room-form', compact('friends'));
    }

    public function selectFriend($uuid)
    {
        if(in_array( $uuid, $this->selectedFriends)){
            $tempList = collect($this->selectedFriends);
            $tempList = $tempList->filter(function($item) use($uuid){
                return $item !== $uuid;
            });
            $this->selectedFriends = $tempList->toArray();
        }else{
            array_push($this->selectedFriends, $uuid);
        }
    }

    public function create()
    {
        $uuid = Str::uuid()->toString();

        $allSelectedUsers = User::whereIn('uuid', $this->selectedFriends)->get();
        $path = $this->photo->store('room-logo');
        if($path){
            Room::create(['name' => $this->roomName, 'description' => $this->description, 'room_img' => $path, 'uuid' => $uuid, 'is_admin' => true, 'user_id' => auth()->user()->id ]);
            if($allSelectedUsers){
                foreach($allSelectedUsers as $user){
                    Room::create(['name' => $this->roomName, 'description' => $this->description,'room_img' => $path, 'uuid' => $uuid, 'is_admin' => false, 'user_id' => $user->id ]);
                }
            }
            $this->alert('success', 'Room created success fully');
        }else{
            $this->alert('warning', 'Failed creating room');
        }
    }

}

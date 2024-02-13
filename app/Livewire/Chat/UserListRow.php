<?php

namespace App\Livewire\Chat;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UserListRow extends Component
{
    public $roomId;
    public $name;
    public $uuid;
    public $isOnline = false;

    public function render()
    {
        return view('livewire.chat.user-list-row');
    }

    public function mount($roomId, $name, $uuid)
    {
        $this->roomId = $roomId;
        $this->name = $name;
        $this->uuid = $uuid;
    }

    public function getListeners()
    {
        return [
            "echo-presence:friends-private-rooom.$this->roomId,here" => "checkOnlineUser",
            "echo-presence:friends-private-rooom.$this->roomId,joining" => "joinRoom",
            "echo-presence:friends-private-rooom.$this->roomId,leaving" => "leaveRoom",
        ];
    }

    public function checkOnlineUser($data)
    {
        if(count($data) > 1){
            $this->isOnline = true;
        }else{
            $this->isOnline = false;
        }
    }

    public function joinRoom($data)
    {
        $this->isOnline = true;

    }

    public function leaveRoom($data)
    {
        $this->isOnline = false;
    }

    public function selectUser($uuid)
    {
        $this->dispatch('userSelected', $uuid);
    }
}

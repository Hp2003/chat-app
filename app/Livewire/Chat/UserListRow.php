<?php

namespace App\Livewire\Chat;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UserListRow extends Component
{
    public $roomId;
    public $name;
    public $uuid;
    public $isOnline = false;
    public $index = 0;

    public function render()
    {
        // getting from cahce when component re-renders
        if(Cache::get($this->roomId)){
            $this->isOnline = Cache::get($this->roomId);
        }
        return view('livewire.chat.user-list-row');
    }

    public function mount($roomId, $name, $uuid, $index)
    {
        $this->roomId = $roomId;
        $this->name = $name;
        $this->uuid = $uuid;
        $this->index = $index;
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
            $this->dispatch('user-online', $this->roomId, $this->index);
            $this->isOnline = true;
            Cache::put($this->roomId , true);
        }else{
            $this->isOnline = false;
        }
    }

    public function joinRoom($data)
    {
        $this->dispatch('user-online', $this->roomId, $this->index);
        Cache::put($this->roomId, true);
        $this->isOnline = true;
    }

    public function leaveRoom($data)
    {
        $this->isOnline = false;
        Cache::put($this->roomId, false);
    }

    public function selectUser($uuid)
    {
        $this->dispatch('userSelected', $uuid);
    }
}

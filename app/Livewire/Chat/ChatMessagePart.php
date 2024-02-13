<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Models\Friend;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class ChatMessagePart extends Component
{
    public $uuid = '';
    public $friend;
    public $selectedUser = [];
    public $chats = [];

    public function render()
    {
        return view('livewire.chat.chat-message-part');
    }

    public function mount($uuid)
    {
        $this->uuid = $uuid;

        if($uuid){
            $this->friend = Friend::where('uuid', $uuid)->first();
            $this->selectedUser = User::find($this->friend->friend_id);
            $this->dispatch('join-channel', $this->friend->room_id,$this->selectedUser->user_name );

            $this->getUserMessages(0);
        }
    }

    /**
     * @param offset int, will get converted int * 25
     * @return void
     */
    public function getUserMessages($offset)
    {
        $messages = Message::where('user_id', auth()->user()->id)->where('sent_to_user_id', $this->selectedUser->id)->orderByDesc('created_at')->limit(25)->offset($offset * 25);
        array_push($this->chats,  ...$messages->get()->toArray());
    }
}

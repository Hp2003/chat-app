<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ChatMessagePart extends Component
{
    use LivewireAlert;

    public $uuid = '';
    public $friend;
    public $selectedUser = [];
    public $chats = [];
    public $message;

    public function render()
    {
        return view('livewire.chat.chat-message-part');
    }

    public function mount(Request $request, $id = null)
    {
        $this->uuid = $id;

        if($this->uuid){
            $this->friend = Friend::where('uuid', $this->uuid)->first();
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

    public function sendMessage()
    {
        $uuid = Str::uuid()->toString();
        $from = auth()->user()->id;
        $to = $this->selectedUser->id;
        $checkAreTehyFriends = Friend::where('user_id', $from)->where('friend_id', $to)->first();

        if($checkAreTehyFriends){
            Message::create(['uuid' => $uuid, 'message' => $this->message, 'user_id' => $from, 'sent_to_user_id' => $to]);
        }else{
            $this->alert('warning', 'Message sending failed');
        }
    }
}

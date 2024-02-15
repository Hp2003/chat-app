<?php

namespace App\Livewire\Chat;

use App\Events\MessageSentEvent;
use App\Models\Message;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Cache;

class ChatMessagePart extends Component
{
    use LivewireAlert;

    public $uuid = '';
    public $friend;
    public $selectedUser = [];
    public $chats = [];
    public $message;
    public $isOnline;
    public $roomId;

    public function render()
    {
        if (Cache::get($this->roomId)) {
            $this->isOnline = Cache::get($this->roomId);
        }

        return view('livewire.chat.chat-message-part');
    }

    public function mount(Request $request, $id = null)
    {
        $this->uuid = $id;

        if ($this->uuid) {
            $this->friend = Friend::where('uuid', $this->uuid)->first();
            $this->roomId = $this->friend->room_id;
            $this->selectedUser = User::find($this->friend->friend_id);
            $this->dispatch('join-channel', $this->friend->room_id, $this->selectedUser->user_name);

            $this->getUserMessages(0);
        }
    }

    /**
     * @param offset int, will get converted int * 25
     * @return void
     */
    public function getUserMessages($offset)
    {
        $messages = Message::where('room_uuid', $this->friend->room_id)
                    ->orderBy('created_at')
                    ->limit(25)
                    ->offset($offset * 25);
        array_push($this->chats,  ...$messages->get()->toArray());
    }

    public function sendMessage()
    {
        if(!strlen($this->message) > 0){
            return 0;
        }
        $uuid = Str::uuid()->toString();
        $from = auth()->user()->id;
        $to = $this->selectedUser->id;
        $checkAreTehyFriends = Friend::where('user_id', $from)->where('friend_id', $to)->first();

        if ($checkAreTehyFriends) {
            $newMsg = Message::create(['uuid' => $uuid, 'message' => $this->message, 'user_id' => $from, 'sent_to_user_id' => $to, 'room_uuid' => $this->friend->room_id]);
            array_push($this->chats, $newMsg->toArray());
            broadcast(new MessageSentEvent($this->roomId, $newMsg->id))->toOthers();
            $this->message = '';
            $this->alert('success', 'Message sent');
        } else {
            $this->alert('warning', 'Message sending failed');
        }
    }

    public function getListeners()
    {
        return [
            "echo-presence:friends-private-rooom.$this->roomId,here" => "checkOnlineUser",
            "echo-presence:friends-private-rooom.$this->roomId,joining" => "joinRoom",
            "echo-presence:friends-private-rooom.$this->roomId,leaving" => "leaveRoom",
            "echo-presence:friends-private-rooom.$this->roomId,MessageSentEvent" => "messageRecived",
        ];
    }

    public function checkOnlineUser($data)
    {
        if (count($data) > 1) {
            $this->isOnline = true;
            Cache::put($this->roomId, true);
        } else {
            $this->isOnline = false;
        }
    }

    public function joinRoom($data)
    {
        Cache::put($this->roomId, true);
        $this->isOnline = true;
    }

    public function leaveRoom($data)
    {
        $this->isOnline = false;
        Cache::put($this->roomId, false);
    }

    public function messageRecived($data)
    {
        $message = Message::find($data['message'])->toArray();

        array_push($this->chats, $message);
    }

    public function deleteMessage($uuid)
    {
        $message = Message::where('uuid', $uuid)->where('user_id', auth()->user()->id)->first();
        if($message){
            $this->alert('warning', 'Failed deleting message');
        }
        $message->delete();

        $messageCollection = collect($this->chats);
        $messageCollection = $messageCollection->filter(function($chat) use ($message){
            return $chat['id'] !== $message->id;
        });

        $this->chats = $messageCollection->toArray();
        $this->alert('success', 'Message deleted successfully');
    }
}

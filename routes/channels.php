<?php

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('test', function(){
    return 'connected';
});
Broadcast::channel('friend-request-recived.{id}', function($id){
    return auth()->user()->id === $id->id;
});
Broadcast::channel('friends-private-rooom.{roomId}', function(User $user, string $roomId){
    $friends = Friend::where('room_id', $roomId)->where('user_id', auth()->user()->id)->first();
    if($friends){
        return [$friends->room_id];
    }
    // return true;
});


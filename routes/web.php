<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\User\Profile;
use App\Livewire\Chat;
use App\Livewire\User\AddFriendForm;
use App\Livewire\User\FriendRequestList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Friend;
use App\Websockets\SendMessageSocketHandler;
use App\Websockets\SocketHandler;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth'])->group(function(){
    Route::get('/', Chat::class);
    Route::get('/chat', Chat::class)->name('chat');

    Route::get('profile', Chat::class)->name('profile');
    Route::get('add_friend', Chat::class)->name('add-friend');
    Route::get('friend_requests', Chat::class)->name('friend-requests');
    Route::get('logout', function(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    });
});
Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');


WebSocketsRouter::websocket('/send-message', SendMessageSocketHandler::class);

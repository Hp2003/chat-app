<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\User\Profile;
use App\Livewire\Chat;
use App\Livewire\User\AddFriendForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function(){
    Route::get('chat', Chat::class);
    Route::get('profile', Profile::class)->name('profile');
    Route::get('add_friend', AddFriendForm::class)->name('add-friend');
    Route::get('logout', function(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    });
});
Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

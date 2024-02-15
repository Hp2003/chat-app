<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Locked;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $userName;
    public $email;
    public $description;
    #[Locked]
    public $oldImg;
    #[Validate('image|max:10240')]
    public $photo;

    public function render()
    {
        return view('livewire.user.profile');
    }

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->name = auth()->user()->name;
        $this->userName = auth()->user()->user_name;
        $this->description = auth()->user()->description;
        $this->oldImg = auth()->user()->profile_img;
    }

    public function update(User $user)
    {
        $name = $this->photo->store('avatar');
        $user = User::find(auth()->user()->id);
        $user->name = $this->name;
        $user->user_name = $this->userName;

        if ($user->profile_img) {
            Storage::delete([$user->profile_img]);
        }
        $user->profile_img = $name;
        $user->description = $this->description;
        $user->save();
    }


}

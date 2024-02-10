<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Profile')]
class Profile extends Component
{
    public function render()
    {
        return view('livewire.user.profile');
    }
}

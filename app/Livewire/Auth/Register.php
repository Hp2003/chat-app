<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Sign up')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.register');
    }

    public function signUp()
    {
        sleep(5);
    }
}

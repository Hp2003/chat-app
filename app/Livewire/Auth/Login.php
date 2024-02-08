<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Sign in')]
#[Layout('components.layouts.app')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        sleep(4);
    }
}

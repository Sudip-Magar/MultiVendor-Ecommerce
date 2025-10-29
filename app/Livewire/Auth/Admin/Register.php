<?php

namespace App\Livewire\Auth\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.admin.register');
    }
}

<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title(content: 'Home')]
#[Layout('components.layouts.user')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.user.home');
    }
}

<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.user')]
#[Title('Review')]

class Review extends Component
{
    public function render()
    {
        return view('livewire.user.review');
    }
}

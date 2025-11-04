<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.user')]
class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.user.about-us');
    }
}

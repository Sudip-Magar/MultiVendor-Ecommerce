<?php

namespace App\Livewire\Admin;

use App\Models\ContactMessage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class Message extends Component
{
    public function render()
    {
        return view('livewire.admin.message',[
            'messages' => ContactMessage::latest()->paginate(10),
        ]);
    }
}

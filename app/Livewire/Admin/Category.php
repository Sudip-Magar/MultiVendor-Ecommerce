<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Category as modelCategory;

#[Layout('components.layouts.admin')]
class Category extends Component
{
    public function render()
    {
        return view('livewire.admin.category',[
            'categories' => modelCategory::with('vendor')->get(),
        ]);
    }
}

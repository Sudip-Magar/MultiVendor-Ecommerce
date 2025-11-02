<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Order as modelOrder;

#[Layout('components.layouts.admin')]
class Order extends Component
{
    public function render()
    {
        return view('livewire.admin.order',[
            'orders' => modelOrder::with('user')->paginate(20),
        ]);
    }
}

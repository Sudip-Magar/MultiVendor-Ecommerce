<?php 

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use App\Models\Order;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class OrderDetail extends Component
{
    public $order;
    public function mount($id){
        $this->order = Order::with('vendorOrders')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.order-detail',[
            'order' => $this->order,
        ]);
    }
}

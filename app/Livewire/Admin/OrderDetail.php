<?php 

namespace App\Livewire\Admin;

use App\Models\VendorOrder;
use Livewire\Attributes\Layout;
use App\Models\Order;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class OrderDetail extends Component
{

    public function recievedOrder($id){
       $vendorOrder = VendorOrder::findOrFail($id);
        $vendorOrder->update(['is_received' => 1]);
    }
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

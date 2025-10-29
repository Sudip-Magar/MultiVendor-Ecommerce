<?php

namespace App\Livewire\Vendor;

use App\Models\VendorOrder;
use Livewire\Component;
use App\Models\Order as modalOrder;

class Order extends Component
{
    public $orders;


    public function mount()
    {
        $vendorId = auth('vendor')->user()->id; // or however you get the vendor ID

       $this->orders = VendorOrder::where('vendor_id',$vendorId)->with('order','items')->get();
    }
    public function render()
    {
        return view('livewire.vendor.order',[
            'orders' => $this->orders,
        ]);
    }
}

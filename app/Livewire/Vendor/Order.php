<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use App\Models\Order as modalOrder;

class Order extends Component
{
    public $orders;


    public function mount()
    {
        $vendorId = auth('vendor')->user()->id; // or however you get the vendor ID

        $orders = modalOrder::whereHas('orderItems.product', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->with([
                    'orderItems' => function ($query) use ($vendorId) {
                        $query->whereHas('product', function ($q) use ($vendorId) {
                            $q->where('vendor_id', $vendorId);
                        })->with('product');
                    }
                ])->get();
        $this->orders = $orders;
    }
    public function render()
    {
        return view('livewire.vendor.order',[
            'orders' => $this->orders,
        ]);
    }
}

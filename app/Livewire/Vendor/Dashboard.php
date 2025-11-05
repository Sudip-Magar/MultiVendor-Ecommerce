<?php

namespace App\Livewire\Vendor;

use App\Models\Product;
use App\Models\VendorOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
        if (!Auth::guard('vendor')->check()) {
            return redirect()->route('vendor.login')
                ->with('error', 'Please login as vendor first.');
        }

        // dd(Auth::guard('vendor')->user());
    }
    public function render()
    {
        $vendorId = Auth::guard('vendor')->user()->id;
        $products = Product::where('vendor_id', $vendorId)->get();
        $orders = VendorOrder::where('vendor_id',$vendorId)->get();
        $recentOrders = VendorOrder::where('vendor_id',$vendorId)->with('order')->latest()->take(5)->get();
        return view('livewire.vendor.dashboard', [
            'products' => $products,
            'orders' => $orders,
            'recentOrders' =>$recentOrders,
        ]);
    }
}

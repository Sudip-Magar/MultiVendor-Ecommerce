<?php

namespace App\Livewire\Vendor\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Livewire;

class ProductList extends Component
{
    public function productDetail($id)
    {
                $this->dispatch('getProductId', productId: $id)->to('vendor.product.update-product');


    }
    public function render()
    {
        return view('livewire.vendor.product.product-list', [
            'products' => Product::where('vendor_id', Auth::guard('vendor')->user()->id)->with('category', 'images')->latest()->paginate(20),
        ]);
    }
}

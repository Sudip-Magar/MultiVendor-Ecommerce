<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components/layouts/user')]
class Vendor extends Component
{
    public $productId, $product;
    public function mount($productId){
        $this->productId = $productId;
        $this->product = Product::with('images','vendor')->findOrFail($productId);

    }
    public function render()
    {
        return view('livewire.user.vendor');
    }
}

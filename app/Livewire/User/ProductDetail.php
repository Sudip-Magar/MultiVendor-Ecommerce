<?php

namespace App\Livewire\User;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components/layouts/user')]
class ProductDetail extends Component
{
    public $productId;
    public $product;
    public $mainImage;

    public function mount($id)
    {
        $this->productId = $id;
        $this->product = Product::with('images')->findOrFail($id);

        // Set the first image as main image
        $this->mainImage = $this->product->images->first()->url ?? 'default/product.jpg';
    }
    public function render()
    {
        return view('livewire.user.product-detail');
    }
}

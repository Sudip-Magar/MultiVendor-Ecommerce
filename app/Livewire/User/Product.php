<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Product as modalProduct;
#[Layout('components/layouts/user')]
class Product extends Component
{
    public $limit = null;

    public function mount($limit = null)
    {
        $this->limit = $limit;
    }
    public function render()
    {
        $productsQuery = modalProduct::with('images')->latest();

        if ($this->limit) {
            $productsQuery->limit($this->limit);
        }
        $products = $productsQuery->get();

        return view('livewire.user.product', [
            'products' => $products,
        ]);
    }
}

<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product as modalProduct;
class Product extends Component
{
    public function render()
    {
        return view('livewire.user.product',[
            'products' => modalProduct::with('category','vendor','firstImage','images')->latest()->get(),
        ]);
    }
}

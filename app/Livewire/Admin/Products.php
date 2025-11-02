<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class Products extends Component
{
    public function viewDetail($id){
        
    }
    public function render()
    {
        return view('livewire.admin.products',[
            'products' => Product::with('vendor','firstImage','category')->paginate(30),
        ]);
    }
}

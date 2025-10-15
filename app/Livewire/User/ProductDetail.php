<?php

namespace App\Livewire\User;

use App\Models\Cart;
use App\Models\Cart_items;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components/layouts/user')]
class ProductDetail extends Component
{
    public $productId;
    public $product;
    public $mainImage;
    public $quantity = 1;


    public function mount($id)
    {
        $this->productId = $id;
        $this->product = Product::with('images')->findOrFail($id);

        // Set the first image as main image
        $this->mainImage = $this->product->images->first()->url ?? 'default/product.jpg';
    }

    public function addToCart()
    {
        $this->validate([
            'quantity' => "required|integer|min:1|max:" . $this->product->stock,
        ]);

        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login')
                ->with('error', 'Please login first to add product to cart.');
        }

        DB::beginTransaction();

        try {
            $userId = Auth::guard('web')->user()->id;
            $cart = Cart::firstOrCreate(['user_id' => $userId]);

            $cartItem = Cart_items::where('cart_id', $cart->id)
                ->where('product_id', $this->productId)
                ->first();

            $price = $this->product->discount
                ? $this->product->price - $this->product->discount_amount
                : $this->product->price;

            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $this->quantity,
                    'price' => $price,
                    'sub_total' => $price * $this->quantity,
                ]);
            } else {
                Cart_items::create([
                    'cart_id' => $cart->id,
                    'product_id' => $this->productId,
                    'quantity' => $this->quantity,
                    'price' => $price,
                    'sub_total' => $price * $this->quantity,
                ]);
            }

            DB::commit();

            session()->flash('success', 'Product added to cart successfully!');
            return redirect()->route('user.cart');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }


    public function render()
    {
        return view('livewire.user.product-detail');
    }
}

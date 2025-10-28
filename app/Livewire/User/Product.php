<?php

namespace App\Livewire\User;

use App\Models\Cart;
use App\Models\Cart_items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function AddToCart($id)
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login')
                ->with('error', 'Please login first to add product to cart.');
        }

        DB::beginTransaction();

        try {
            $product = modalProduct::find($id);
            $userId = Auth::guard('web')->user()->id;
            $cart = Cart::firstOrCreate(['user_id' => $userId]);

            $cartItem = Cart_items::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->first();

            $price = $product->discount
                ? $product->price - $product->discount_amount
                : $product->price;

            if ($cartItem) {
                DB::rollBack();
                return redirect()->route('user.product')->with('error', 'This is product is already in cart');
            } else {
                Cart_items::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $price,
                    'sub_total' => $price,
                ]);

                DB::commit();
                return redirect()->route('user.product')->with('success', 'Product added to cart');
            }


        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }
    public function render()
    {
        $productsQuery = modalProduct::with('images','vendor')->latest();

        if ($this->limit) {
            $productsQuery->limit($this->limit);
        }
        $products = $productsQuery->get();

        return view('livewire.user.product', [
            'products' => $products,
        ]);
    }
}

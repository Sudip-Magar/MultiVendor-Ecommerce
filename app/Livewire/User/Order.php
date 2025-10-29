<?php

namespace App\Livewire\User;

use App\Models\Order_item;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Order as ModalOrder;

#[Layout('components/layouts/user')]
class Order extends Component
{
    public $orders, $orderItem;
    public function mount()
    {
        if (Auth::guard('web')->check()) {
            $userid = Auth::guard('web')->user()->id;
            $this->orders = ModalOrder::where('user_id', $userid)->with('orderItems', 'orderItems.product', 'user', 'vendorOrders')->latest()->get();
            // dd($this->orders);
        } else {
            return redirect()->route('user.login')->with('error', 'Login first');
        }
    }

    public function popDeleteOrder($id)
    {
        $this->orderItem = ModalOrder::with('orderItems.product', 'user')->find($id);
        // dd($this->order);
    }
    public function deleteOrder()
    {
        DB::beginTransaction();
        try {
            $order = ModalOrder::find($this->orderItem->id);
            $orderItems = Order_item::where('order_id', $order->id)->get();
            if ($order) {
                foreach ($orderItems as $item) {
                    $product = Product::find($item->product->id);
                    $product->stock = $product->stock + $item->quantity;
                    $product->save();
                }
                $order->orderItems()->delete();
                $order->delete();
            }
            DB::commit();
            return redirect()->route('user.order')->with('success', 'Order Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }
    public function render()
    {
        return view('livewire.user.order', [
            'orders' => $this->orders,
        ]);
    }
}

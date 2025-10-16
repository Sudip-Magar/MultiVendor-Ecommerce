<section class="bg-gray-100 min-h-screen py-10" x-data="cart">
    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-6">🛒 Shopping Cart</h2>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-gray-700">
                        <th></th>
                        <th class="px-4 py-3 text-left">Product</th>
                        <th class="px-4 py-3 text-center">Price</th>
                        <th class="px-4 py-3 text-center">Quantity</th>
                        <th class="px-4 py-3 text-center">Subtotal</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @foreach ($carts as $cart)
                        @foreach ($cart->cartItems as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td><input class="cusrsor-pointer" type="checkbox"></td>
                                <!-- Product Info -->
                                <td class="px-4 py-4 flex items-center space-x-3 min-w-[200px]">
                                    <img src="{{ asset('storage/' . ($item->product->images->first()->url ?? 'default/product.webp')) }}"
                                        alt="{{ $item->product->name }}"
                                        class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                                    <div class="truncate">
                                        <h3 class="font-medium text-gray-800 truncate">{{ $item->product->name }}</h3>
                                        <p class="text-gray-500 text-xs truncate">{{ $item->product->summary }}</p>
                                        <p>Stock Left: {{ $item->product->stock }}</p>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td class="px-4 py-4 text-center whitespace-nowrap">
                                    @if ($item->product->discount)
                                        <div class="flex flex-col items-center">
                                            <span class="text-gray-400 line-through text-sm">
                                                Rs. {{ $item->product->price }}
                                            </span>
                                            <span class="text-red-500 font-semibold">
                                                Rs. {{ $item->product->price - $item->product->discount_amount }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="text-gray-700 font-semibold">
                                            Rs. {{ $item->product->price }}
                                        </span>
                                    @endif
                                </td>

                                <!-- Quantity -->
                                <td class="px-4 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300 cursor-pointer"
                                            wire:click="decrementQuantity({{ $item->id }})">-</button>
                                        <input type="number" wire:model.lazy="cartItems.{{ $item->id }}"
                                            min="1"
                                            class="w-12 text-center border rounded-md focus:ring-2 focus:ring-indigo-400 outline-none">

                                        <button class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300 cursor-pointer"
                                            wire:click="incrementQuantity({{ $item->id }})">+</button>
                                    </div>
                                    @error('cartItems.' . $item->id)
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </td>

                                <!-- Subtotal -->
                                <td class="px-4 py-4 text-center font-semibold text-gray-800 whitespace-nowrap">
                                    Rs. {{ $item->sub_total }}
                                </td>

                                <!-- Remove -->
                                <td class="px-4 py-4 text-center ">
                                    <button class="text-red-500 text-sm hover:underline cursor-pointer" @click="show"
                                        wire:click='removePopup({{ $item->id }})'>Remove</button>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <div class="mt-8 border-t pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-gray-700 space-y-2">
                    <div class="flex justify-between w-60 md:w-80">
                        <span>Subtotal</span>
                        <span>Rs. {{ $subTotal }}</span>
                    </div>
                    <div class="flex justify-between w-60 md:w-80">
                        <span>Tax</span>
                        <span>Rs. 100</span>
                    </div>
                    <div class="flex justify-between w-60 md:w-80 font-semibold text-lg">
                        <span>Total</span>
                        <span>Rs. 2500</span>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-3 mt-4 md:mt-0">
                    <a href="{{ route('user.product') }}" class="text-gray-600 hover:underline text-sm md:text-base">
                        ← Continue Shopping
                    </a>
                    <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div x-show="popup" x-transition.opacity x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm z-50">
        <!-- Modal Box -->
        <div x-transition.scale class="bg-white w-full max-w-sm rounded-lg shadow-lg p-5 relative">
            <!-- Close Button -->
            <button @click.prevent="popup = false"
                class="absolute top-2 right-3 text-gray-400 hover:text-gray-600 text-xl leading-none cursor-pointer">
                &times;
            </button>

            <h2 class="text-base text-red-700 border-b pb-2 mb-3 my-3">
                @if ($cartItem)
                    Are you sure you want to remove <span class="font-semibold"> {{ $cartItem->product->name }}</span> from cart?
                @endif
            </h2>
            <div class="flex gap-2 justify-end mt-4">
                <button @click.prevent="popup = false"
                    class="bg-green-800 hover:bg-green-900 py-1 px-3 rounded-md cursor-pointer text-white block">Cancel</button>
                <button class="bg-red-800 hover:bg-red-900 py-1 px-3 rounded-md cursor-pointer text-white block"
                    wire:click.prevent='deleteItem'>Delete</button>
            </div>
        </div>
    </div>
</section>

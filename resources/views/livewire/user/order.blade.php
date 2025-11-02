<div class="max-w-5xl mx-auto px-4 py-8" x-data="order">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Order History</h1>

    <div class="space-y-6">

        <!-- Order 1 -->
        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500 relative">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-xl font-semibold">{{ $order->order_number }}</h2>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">Placed: {{ $order->created_at }}</span>
                            <button @click.prevent="show" wire:click='popDeleteOrder({{ $order->id }})'
                                class="text-red-600 hover:text-red-800 font-semibold px-2 py-1 rounded cursor-pointer"
                                title="Cancel Order">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                        <div class="mb-3 md:mb-0">
                            <p><strong>Status:</strong>
                                @if ($order->order_status == 'Pending')
                                    <span class="text-yellow-500">{{ $order->order_status }}</span>
                                @elseif ($order->order_status == 'Processing')
                                    <span class="text-blue-500">{{ $order->order_status }}</span>
                                @elseif ($order->order_status == 'Delivered')
                                    <span class="text-green-500">{{ $order->order_status }}</span>
                                @elseif ($order->order_status == 'Cancelled')
                                    <span class="text-green-500">{{ $order->order_status }}</span>
                                @endif
                            </p>
                            <p><strong>Payment:</strong> {{ $order->payment_method }}</p>
                        </div>
                        <div>
                            <p><strong>Total:</strong> Rs. {{ $order->price }}</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-medium mb-2">Items:</h3>
                        <ul class="divide-y divide-gray-200">
                            @foreach ($order->orderItems as $item)
                                <li class="py-2 flex justify-between">
                                    <span>{{ $item->product->name }}
                                        <span class="text-green-500">x{{ $item->quantity }}</span>
                                        <span class="ms-10">
                                            @if ($item->vendorOrder->status == 'Cancelled')
                                                <small class="bg-red-500 px-2 py-0.5 rounded-xl text-white">Order has
                                                    been cancelled by
                                                    {{ $item->vendorOrder->vendor->shop_name }}</small>
                                            @endif
                                        </span>

                                    </span>
                                    <span>Rs. {{ $item->total }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

            <div x-show="popup" x-transition.opacity x-cloak
                class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm z-50">
                <!-- Modal Box -->
                <div x-transition.scale class="bg-white w-full max-w-sm rounded-lg shadow-lg p-5 relative">
                    <!-- Close Button -->
                    <button @click.prevent="popup = false"
                        class="absolute top-2 right-3 text-gray-400 hover:text-gray-600 text-xl leading-none cursor-pointer">
                        &times;
                    </button>

                    @if ($orderItem && $orderItem->orderItems)
                        <div class=" border-b pb-2 mb-3 my-3">
                            <h2 class="text-base text-red-700">
                                Are you sure you want to delete <br /> {{ $orderItem->order_number }} ??
                            </h2>
                            @foreach ($orderItem->orderItems as $item)
                                <div>{{ $item->product?->name ?? 'No Name' }}</div>
                            @endforeach

                        </div>
                    @endif
                    <div class="flex gap-2 justify-end mt-4">
                        <button @click.prevent="popup = false"
                            class="bg-green-800 hover:bg-green-900 py-1 px-3 rounded-md cursor-pointer text-white block">Cancel</button>
                        <button class="bg-red-800 hover:bg-red-900 py-1 px-3 rounded-md cursor-pointer text-white block"
                            wire:click.prevent='deleteOrder'>Delete</button>
                    </div>
                </div>
            </div>
        @endif



    </div>
</div>

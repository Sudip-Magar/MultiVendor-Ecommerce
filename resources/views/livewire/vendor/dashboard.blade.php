<div class="p-6 space-y-6">

    <!-- Top Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Products</p>
                    <h3 class="text-2xl font-bold text-blue-600 mt-1">{{ $products ? count($products) : 0 }}</h3>
                </div>
                <i class="fa-solid fa-box text-blue-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Orders</p>
                    <h3 class="text-2xl font-bold text-green-600 mt-1">{{ $orders ? count($orders) : 0 }}</h3>
                </div>
                <i class="fa-solid fa-truck text-green-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Earnings</p>
                    <h3 class="text-2xl font-bold text-yellow-600 mt-1">Rs.
                        {{ $orders ? number_format($orders->sum('subtotal'), 2) : 0 }}</h3>
                </div>
                <i class="fa-solid fa-coins text-yellow-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Messages</p>
                    <h3 class="text-2xl font-bold text-red-600 mt-1">8</h3>
                </div>
                <i class="fa-solid fa-envelope text-red-500 text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Recent Orders Section -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Recent Orders</h2>
            <a href="{{ route('vendor.order') }}" class="text-blue-600 text-sm hover:underline">View All</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="text-gray-600 border-b">
                    <tr>
                        <th class="py-3 px-4">Order ID</th>
                        <th class="py-3 px-4">Customer</th>
                        <th class="py-3 px-4">Total</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Date</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @if (count($recentOrders) > 0)
                        @foreach ($recentOrders as $recentOrder)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4 font-medium">{{ $recentOrder->order->order_number }}</td>
                                <td class="py-3 px-4">{{ $recentOrder->order->name }}</td>
                                <td class="py-3 px-4">Rs. {{ $recentOrder->subtotal }}</td>
                                <td class="py-3 px-4">
                                    @if ($recentOrder->status == 'Pending')
                                        <span class="bg-orange-100 text-orange-700 px-2 py-1 rounded text-xs">Pending
                                        </span>
                                    @elseif($recentOrder->status == 'Processing')
                                        <span
                                            class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Delivered</span>
                                    @elseif($recentOrder->status == 'Delivered')
                                        @if ($recentOrder->is_received)
                                            <span
                                                class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Delivered</span>
                                        @else
                                            <span
                                                class="bg-pink-100 text-pink-700 px-2 py-1 rounded text-xs">Dispatched</span>
                                        @endif
                                    @elseif($recentOrder->status == 'Cancelled')
                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Cancelled</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">{{ $recentOrder->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        @else
                        <tr class="text-center ">
                            <td colspan="5" class="py-4 px-4 font-semibold text-2xl text-gray-400">No Recent Order</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Analytics / Graph placeholder -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Sales Overview</h2>
        <div class="h-48 flex items-center justify-center text-gray-400 border border-dashed rounded-lg">
            <span>Chart Coming Soon...</span>
        </div>
    </div>

</div>

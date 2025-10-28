<section class="bg-gray-100 min-h-screen py-10">
  <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-md p-6">
    <h2 class="text-3xl font-semibold mb-6 flex items-center justify-between">
      🛍️ Vendor Orders
      <span class="text-sm text-gray-500">Total Orders: 124</span>
    </h2>

    <!-- Orders Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
          <tr>
            <th class="px-4 py-3 text-left">#</th>
            <th class="px-4 py-3 text-left">Order ID</th>
            <th class="px-4 py-3 text-left">Customer</th>
            <th class="px-4 py-3 text-left">Items</th>
            <th class="px-4 py-3 text-left">Total</th>
            <th class="px-4 py-3 text-left">Status</th>
            <th class="px-4 py-3 text-left">Date</th>
            <th class="px-4 py-3 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <!-- Single Order Row -->
          <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3 font-medium text-gray-700">1</td>
            <td class="px-4 py-3 font-semibold text-blue-600">#ORD-1023</td>
            <td class="px-4 py-3">Ram Thapa</td>
            <td class="px-4 py-3">5 items</td>
            <td class="px-4 py-3 font-semibold">Rs. 2,350</td>
            <td class="px-4 py-3">
              <select class="text-sm border rounded-lg px-2 py-1 focus:ring focus:ring-blue-200">
                <option value="pending" selected>Pending</option>
                <option value="processing">Processing</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </td>
            <td class="px-4 py-3 text-gray-600">2025-10-28</td>
            <td class="px-4 py-3 text-center">
              <div class="flex justify-center gap-2">
                <button class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-lg transition">View</button>
                <button class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded-lg transition">Delete</button>
              </div>
            </td>
          </tr>

          <!-- Example more rows -->
          <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3 font-medium text-gray-700">2</td>
            <td class="px-4 py-3 font-semibold text-blue-600">#ORD-1024</td>
            <td class="px-4 py-3">Sita Lama</td>
            <td class="px-4 py-3">3 items</td>
            <td class="px-4 py-3 font-semibold">Rs. 1,480</td>
            <td class="px-4 py-3">
              <select class="text-sm border rounded-lg px-2 py-1 focus:ring focus:ring-blue-200">
                <option value="pending">Pending</option>
                <option value="processing" selected>Processing</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </td>
            <td class="px-4 py-3 text-gray-600">2025-10-28</td>
            <td class="px-4 py-3 text-center">
              <div class="flex justify-center gap-2">
                <button class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-lg transition">View</button>
                <button class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded-lg transition">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
      <p class="text-sm text-gray-600">Showing 1–10 of 124 orders</p>
      <div class="flex space-x-1">
        <button class="px-3 py-1 border rounded-lg text-sm hover:bg-gray-100">Prev</button>
        <button class="px-3 py-1 border rounded-lg bg-blue-500 text-white text-sm">1</button>
        <button class="px-3 py-1 border rounded-lg text-sm hover:bg-gray-100">2</button>
        <button class="px-3 py-1 border rounded-lg text-sm hover:bg-gray-100">Next</button>
      </div>
    </div>
  </div>
</section>

<section>
    <table  class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
            <tr>
                <th class="px-4 py-2 border-b">#</th>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Stock</th>
                <th class="px-4 py-2 border-b">Discount</th>
                <th class="px-4 py-2 border-b">Category</th>
                <th class="px-4 py-2 border-b">Summary</th>
                <th class="px-4 py-2 border-b text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($products as $key => $product)
                <tr class="hover:bg-gray-50">
                {{-- {{ $products }} --}}
                <td class="px-4 py-2">{{ $key + 1 }}</td>
                <td class="px-4 py-2">{{$product->name}}</td>
                <td class="px-4 py-2">{{$product->stock}}</td>
                <td class="px-4 py-2">{{$product->discount}}%</td>
                <td class="px-4 py-2">{{$product->category->name}}</td>
                <td class="px-4 py-2">{{$product->summary}}</td>
                <td class="px-4 py-2 text-center space-x-3">
                    <button  class="text-blue-500 hover:underline text-sm cursor-pointer" wire:click="productDetail({{$product->id}})" @click.prevent="showUpdateView">Edit</button>
                    <button class="text-red-500 hover:underline text-sm cursor-pointer">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

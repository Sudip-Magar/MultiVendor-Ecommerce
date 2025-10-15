<section class="" x-data="{ mainImage: '{{ asset('storage/' . $mainImage) }}' }">
    <div class="w-[90%] md:w-[80%] mx-auto my-10 grid md:grid-cols-2 gap-6">
        <!-- Left: Product Images -->
        <div>
            <!-- Main Image -->
            <img :src="mainImage" class="w-full h-96 object-cover rounded-lg mb-3" alt="Product">

            <!-- Thumbnail Images -->
            <div class="flex space-x-2">
                @foreach ($product->images as $img)
                    <img src="{{ asset('storage/' . $img->url) }}" class="w-20 h-20 object-cover rounded cursor-pointer"
                        @click.prevent="mainImage='{{ asset('storage/' . $img->url) }}'">
                @endforeach
            </div>
        </div>

        <!-- Right: Product Info -->
        <div class="space-y-4">
            <h2 class="text-3xl font-bold">{{ $product->name }}</h2>
            <p class="text-gray-600">{{ $product->description }}</p>

            <p class="text-lg font-semibold">
                Price: <span class="line-through text-gray-400">{{ $product->price }}</span>
                @if ($product->discount)
                    <span class="text-red-600">
                        {{ $product->price - ($product->price * $product->discount) / 100 }}
                    </span>
                @endif
            </p>
            <p>Stock: {{ $product->stock }}</p>

            <!-- Action Buttons -->
            <div class="flex space-x-3">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 duration-150">
                    Add to Cart
                </button>
                <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 duration-150">
                    Wishlist
                </button>
            </div>

            <!-- Additional Info -->
            <div class="mt-5">
                <h3 class="font-semibold">Product Details:</h3>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Feature 1: Example detail</li>
                    <li>Feature 2: Example detail</li>
                    <li>Feature 3: Example detail</li>
                </ul>
            </div>
        </div>
    </div>

    <div>
        @livewire('user.product', ['limit' => 5])
    </div>
</section>

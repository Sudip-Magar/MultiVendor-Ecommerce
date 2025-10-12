<header class="my-13 flex justify-center text-white">
    <div class="w-full px-3">
        {{-- <h1 class="text-2xl mt-5 border-b font-bold flex justify-center pb-4">
            {{ Auth::guard('vendor')->user()->shop_name }}</h1> --}}
        <div class="flex justify-center items-center space-y-1 flex-col">
            @if (Auth::guard('vendor')->user()->shop_image)
                <img class="w-20 h-20 rounded-full object-cover"
                    src="{{ asset('storage/' . Auth::guard('vendor')->user()->shop_image) }}" alt="">
            @else
                <img class="w-20 h-20 rounded-full object-cover" src="{{ asset('default/vendor.jpg') }}" alt="">
            @endif
            <h1 class="text-base">{{ Auth::guard('vendor')->user()->shop_name }}</h1>
        </div>

        <nav class="mt-10">
            <ul class="space-y-4 text-sm ">
                <li>
                    <a class="hover:bg-white hover:text-black py-2 px-4 hover:duration-200 flex items-center gap-2 {{ request()->is('vendor/dashboard') ? 'bg-white text-black' : 'text-white hover:bg-white hover:text-black transition ' }}" wire:navigate
                        href="{{route('vendor.dashboard')}}">
                        <span :class="open ? 'block' : 'hidden duration-0'"><i class="fas fa-tachometer-alt"></i>
                            Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="hover:bg-white hover:text-black py-2 px-4 hover:duration-200 flex items-center gap-2 {{ request()->is('vendor/product') ? 'bg-white text-black' : 'text-white hover:bg-white hover:text-black transition ' }}" wire:navigate
                        href="">
                        <span :class="open ? 'block' : 'hidden duration-0'"><i class="fas fa-box"></i> Products</span>
                    </a>
                </li>
                <li>
                    <a class="hover:bg-white hover:text-black py-2 px-4 hover:duration-200 flex items-center gap-2 {{ request()->is('vendor/category') ? 'bg-white text-black' : 'text-white hover:bg-white hover:text-black transition ' }}" wire:navigate
                        href="{{route('vendor.category')}}">
                        <span :class="open ? 'block' : 'hidden duration-0'"><i class="fas fa-tags"></i> Category</span>
                    </a>
                </li>
                <li>
                    <a class="hover:bg-white hover:text-black py-2 px-4 hover:duration-200 flex items-center gap-2 {{ request()->is('vendor/order') ? 'bg-white text-black' : 'text-white hover:bg-white hover:text-black transition ' }}" wire:navigate
                        href="">
                        <span :class="open ? 'block' : 'hidden duration-0'"><i class="fas fa-shopping-cart"></i>
                            Orders</span>
                    </a>
                </li>
                <li>
                    <a class="hover:bg-white hover:text-black py-2 px-4 hover:duration-200 flex items-center gap-2 {{ request()->is('vendor/setting') ? 'bg-white text-black' : 'text-white hover:bg-white hover:text-black transition ' }}" wire:navigate
                        href="">
                        <span :class="open ? 'block' : 'hidden duration-0'"><i class="fas fa-cog"></i> Setting</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</header>

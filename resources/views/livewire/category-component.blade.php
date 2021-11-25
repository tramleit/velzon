<section class="flex bg-white">
    <nav class="flex flex-col w-64 p-3 text-sm bg-gray-200">
        <div class="text-sm font-bold text-black" href="#">Department</div>
            <div class="p-2">
                <span class="font-bold">Computers</span>
                <ul class="p-2">
                    @foreach ($categories as $category)
                    <li class="">
                        <a href="{{ route('product.category', ['category_slug'=>$category->slug]) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                    {{-- <li><a href="#">Computer Accessories & Peripherals</a></li>
                    <li><a href="#">Computer Components</a></li>
                    <li><a href="#">Computer & Tablets</a></li>
                    <li><a href="#">Data Storage</a></li>
                    <li><a href="#">Laptop Accessories</a></li>
                    <li><a href="#">Monitors</a></li>
                    <li><a href="#">Networking Products</a></li>
                    <li><a href="#">Power Strips & Surge</a></li>
                    <li><a href="#">Protectors</a></li>
                    <li><a href="#">Printers</a></li>
                    <li><a href="#">Scanners</a></li>
                    <li><a href="#">Servers</a></li>
                    <li><a href="#">Tablet Accessories</a></li>
                    <li><a href="#">Tablet Replacement Parts</a></li>
                    <li><a href="#">Warranties & Services</a></li> --}}

                </ul>
            </div>

        <div class="text-sm font-bold text-black">Climate Pledge Friendly</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Climate Pledge Friendly</li>
            </ul>

        <div class="text-sm font-bold text-black">Velzon Certified</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Auto Replenishment</li>
                <li><input type="checkbox" class="rounded">Works with Alexa</li>
            </ul>

        <div class="text-sm font-bold text-black">From Our Brands</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Our Brands</li>
            </ul>

        <div class="text-sm font-bold text-black">Featured Brands</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Roku</li>
                <li><input type="checkbox" class="rounded">HP</li>
                <li><input type="checkbox" class="rounded">Samsung</li>
                <li><input type="checkbox" class="rounded">Seagate</li>
                <li><input type="checkbox" class="rounded">Logitech</li>
                <li><input type="checkbox" class="rounded">Addatam</li>
                <li><input type="checkbox" class="rounded">SanDisk</li>
            </ul>

        <div class="text-sm font-bold text-black">Packaging Option</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Frustration-Free Packaging</li>
            </ul>

        <div class="text-sm font-bold text-black">Avg. Customer Review</div>
            <ul class="p-2">
                <li>⭐⭐⭐⭐☆ & Up</li>
                <li>⭐⭐⭐☆☆ & Up</li>
                <li>⭐⭐☆☆☆ & Up</li>
                <li>⭐☆☆☆☆ & Up</li>
            </ul>

        <div class="text-sm font-bold text-black">New & Upcoming</div>
            <ul class="p-2">
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Coming Soon</a></li>
            </ul>

        <div class="text-sm font-bold text-black">Certifications</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Energy Star</li>
            </ul>

        <div class="text-sm font-bold text-black">Velon Global Store</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Velzon Global Store</li>
            </ul>

        <div class="text-sm font-bold text-black">Condition</div>
            <ul class="p-2">
                <li><a href="#">New</a></li>
                <li><a href="#">Used</a></li>
                <li><a href="#">Renewed</a></li>
            </ul>

        <div class="text-sm font-bold text-black">Price</div>
            <ul class="p-2">
                <li><a href="#">Under $25</a></li>
                <li><a href="#">$25 to $100</a></li>
                <li><a href="#">$100 to $200</a></li>
                <li><a href="#">$200 to $Above</a></li>
            </ul>

        <div class="text-sm font-bold text-black">Deals</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Today's Deals</li>
            </ul>

        <div class="text-sm font-bold text-black">Seller</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Velzon Export Sales LLC.</li>
                <li><input type="checkbox" class="rounded">Velzon.com</li>
                <li><input type="checkbox" class="rounded">Fintie</li>
                <li><input type="checkbox" class="rounded">CWP Online</li>
                <li><input type="checkbox" class="rounded">Mosiso</li>
                <li><input type="checkbox" class="rounded">Tech Vendor</li>
                <li><input type="checkbox" class="rounded">Velzon Global Store UK</li>
                <li><input type="checkbox" class="rounded">Cable Matters</li>
                <li><input type="checkbox" class="rounded">❤️ OnlineEmart (We record SN)</li>
                <li><input type="checkbox" class="rounded">UGREEN GROUP LIMITED</li>
            </ul>

        <div class="text-sm font-bold text-black">Availability</div>
            <ul class="p-2">
                <li><input type="checkbox" class="rounded">Include Out of Stock</li>
            </ul>
    </nav>

    <article class="w-screen p-4 bg-gray-100">
        <div class="text-3xl font-bold">{{ $category_name }}</div>
        <span class="text-sm">
            Shop laptops, desktops, monitors, tablets, PC gaming, hard drives and storage, accessories and more
        </span>
        <span class="">
            <select name="filter" class="cursor-pointer" wire:model="sorting">
                <option value="default" selected="selected">Default</option>
                <option class="cursor-pointer" value="date">newness</option>
                <option class="cursor-pointer" value="price">low to high</option>
                <option class="cursor-pointer" value="price-desc">high to low</option>
            </select>
        </span>

        <span class="">
            <select name="post-per-page" class="cursor-pointer" wire:model="pagesize">
                <option value="12" selected="selected">12 items</option>
                <option class="cursor-pointer" value="18">18 items</option>
                <option class="cursor-pointer" value="24">24 items</option>
                <option class="cursor-pointer" value="32">32 items</option>
            </select>
        </span>

        {{-- products card --}}
        <div class="grid h-64 grid-cols-3 gap-4 my-6">
            @foreach ($products as $product)
            <div class="p-2 mb-5">
                <a href="{{ route('product.details', ['slug'=>$product->slug]) }}" >
                    <img class="mb-2" src="{{ asset('assets/images/products/') }}/{{ $product->image }}" alt="{{ $product->name }}">
                        <div class="">{{ $product->name }}</div>
                </a>
                <div class="text-sm">
                    <div class="text-gray-700 ">John Doe</div>
                    <div class="my-1">⭐⭐⭐⭐</div>
                    <div class="my-2 text-yellow-700"> <span class="align-top">$</span><span class="text-lg font-semibold">{{ $product->regular_price }}</span><span class="align-top">99</span></div>
                    <div class="mb-2">Arrives: <span class="font-semibold">Sunday, January 01</span> </div>
                    <div class="mb-2">Category: <span class="font-semibold">{{ $product->category->name }}</span> </div>
                    <a href="#" class="absolute px-2 py-1 text-sm bg-gray-200 border border-black "
                       wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Add to Cart</a>
                </div>
            </div>
            @endforeach
            {{ $products->links() }}
        </div>

    </article>
</section>

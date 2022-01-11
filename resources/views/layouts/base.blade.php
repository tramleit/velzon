<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Velzon</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- flickty -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <!-- Alpine Plugins -->
     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script> --}}
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @livewireStyles
</head>
<style>

body { font-family: sans-serif; }

.carousel-cell {
  width: 66%;
  height: 200px;
  margin-right: 10px;
  border-radius: 5px;
}

[x-cloak] { display: none !important; }
</style>
<body class="p-0 m-0">

{{-- Navbar --}}
<div class="sticky top-0 flex items-center" style=" height:60px; z-index: 100; background-color: #131921;">
    <a href="/" class="">
        <img class="object-contain" style="width: 100px; margin: 0 20px; margin-top: 18px;"
            src="http://pngimg.com/uploads/amazon/amazon_PNG11.png" alt="amazon-logo" class="header__logo">
    </a>

    @livewire('header-search-component')

    <div class="flex justify-evenly">
        @if (Route::has('login'))
            @auth
                @if (Auth::user()->utype === 'ADM')
                {{-- <div class="flex flex-col mx-3 text-white"> --}}
                    {{-- <span class="text-sm">Hello, {{ Auth::user()->name }}</span> --}}

                <!-- Dropdown 1 -->
                <div x-data="{ open: false }" @mouseleave="open = false" class="relative inline-block">
                    <!-- Dropdown Toggle Button -->
                    <button @mouseover="open = true" class="flex items-center px-3 py-2 bg-white rounded-lg mx-2">
                        <span class="mr-4">See All Actions</span>
                        <span
                            :class="open = ! open ? '' : '-rotate-180'"
                            class="transition-transform duration-500 transform">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </span>
                    </button>
                    <!-- End Dropdown Toggle Button -->

                    <!-- Dropdown Menu -->
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        class="absolute right-0 py-1 text-gray-500 bg-white rounded-lg shadow-xl w-96">
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-1 hover:text-blue-400">Dashboard</a>
                        <a href="{{ route('admin.categories') }}" class="block px-4 py-1 hover:text-blue-400">Categories</a>
                        <a href="{{ route('admin.products') }}" class="block px-4 py-1 hover:text-blue-400">All Products</a>
                        <a href="{{ route('admin.homeslider') }}" class="block px-4 py-1 hover:text-blue-400">Manage Home Slider</a>
                        <a href="{{ route('admin.homecategories') }}" class="block px-4 py-1 hover:text-blue-400">Manage Home Categories</a>
                        <a  href="{{ route('logout') }}" class="block px-4 py-1 hover:text-blue-400"  class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 focus:outline-none focus:ring focus:ring-aqua-400 disabled:text-gray-500"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            Log Out
                        </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST">
                            @csrf
                        </form>
                    </div>
                    <!-- End Dropdown Menu -->
                </div>
                <!-- End Dropdown 1 -->

                @else
                <div class="flex flex-col mx-3 text-white">
                    <span class="" style="font-size: 12px" >Hello, {{ Auth::user()->name }}</span>
                    <a href="{{ route('user.dashboard') }}" style="font-size: 12px" >Dashboard</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit(); "
                        class=""
                        style="font-size: 14px; font-weight: 800;" >Logout</a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf
                    </form>
                </div>
                @endif
                @else
                <div class="mx-3 text-white">
                    <span  class="mx-3 cursor-pointer" style="font-size: 14px; font-weight: 800;" > <a href="{{ route('login') }}">Sign In</a> </span>
                    <span href="{{ route('logout') }}" class="mx-3 cursor-pointer" style="font-size: 14px; font-weight: 800" > <a href="{{ route('register') }}"> Sign Up</a></span>
                </div>
                @endif
        @endif

        <div class="flex flex-col mx-3 text-white">
            <span class="" style="font-size: 12px" >Returns</span>
            <span class="" style="font-size: 14px; font-weight: 800;" >& Orders</span>
        </div>

        <a href="{{ ('cart') }}"  class="flex items-center" style="color: white">
            <x-heroicon-o-shopping-cart class="w-8 h-8" />
            <div class="" style="font-size: 14px; font-weight: 800; margin-left: 10px; margin-right: 10px">
                @if ( Cart::count() > 0 )
               <span> {{ Cart::count() }} </span>
               @endif
               <span>Cart</span>
            </div>
        </a>

    </div>
</div>

    {{ $slot }}

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script></body>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Alpine -->
    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireScripts

    @stack('scripts')
</body>
</html>

<!-- Header -->


<header class="relative z-50 text-white bg-gray-900 shadow-lg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <nav class="container px-6 py-4 mx-auto">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="text-2xl font-bold tracking-wider">
                <a href="{{route('shop.index')}}" class="flex items-center space-x-2">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <span>Phone Store</span>
                </a>
            </div>

            <!-- Menu Links -->
            <div class="items-center hidden space-x-8 md:flex">
                <a href="{{route('shop.index')}}" class="transition-colors hover:text-blue-400">Trang chủ</a>
                <a href="{{route('shop.products')}}" class="transition-colors hover:text-blue-400">Sản phẩm</a>
                <a href="#" class="transition-colors hover:text-blue-400">Khuyến mãi</a>
                <a href="#" class="transition-colors hover:text-blue-400">Liên hệ</a>
            </div>

            <!-- Search and User Actions -->
            <div class="flex items-center space-x-6">
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text"
                        class="w-64 py-2 pl-10 pr-4 text-white transition-all bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Tìm kiếm sản phẩm" />
                    <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <!-- Shopping Cart -->
                <div class="relative">
                    <a href="#" class="flex items-center transition-colors hover:text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span
                            class="absolute flex items-center justify-center w-5 h-5 text-xs text-white bg-blue-500 rounded-full -top-2 -right-2">
                            {{ \Cart::getTotalQuantity() }}
                        </span>

                    </a>
                </div>

                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 transition-colors hover:text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 z-50 hidden pt-2 group-hover:block">
                        <div class="relative w-48 py-1 bg-white rounded-md shadow-lg">
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Thông tin tài khoản</a>
                            <a href="{{route('shop.cart')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Đơn
                                hàng của tôi</a>
                            <div class="border-t border-gray-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-100">
                                        Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<script src="https://cdn.tailwindcss.com"></script>


@yield('cart')
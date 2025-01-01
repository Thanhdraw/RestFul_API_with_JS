<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <div class="flex">
            <aside class="w-64 min-h-screen bg-white shadow">
                <nav class="mt-5 px-2">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100 rounded-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        Dashboard
                    </a>

                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full px-4 py-2 mt-2 text-sm font-medium text-gray-800 rounded-md hover:bg-gray-100 focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H18">
                                    </path>
                                </svg>
                                <span>Bài viết</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="mt-2 space-y-2 px-4">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Thêm mới</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Danh sách</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Danh mục</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full px-4 py-2 mt-2 text-sm font-medium text-gray-800 rounded-md hover:bg-gray-100 focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <span>Sản phẩm</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="mt-2 space-y-2 px-4">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Thêm mới</a>
                            <a href="{{ route('admin.product.list') }}"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Danh sách</a>
                            <a href="{{ route('admin.category.list') }}"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Danh mục</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full px-4 py-2 mt-2 text-sm font-medium text-gray-800 rounded-md hover:bg-gray-100 focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <span>Bán hàng</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="mt-2 space-y-2 px-4">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Đơn hàng</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full px-4 py-2 mt-2 text-sm font-medium text-gray-800 rounded-md hover:bg-gray-100 focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                <span>Users</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="mt-2 space-y-2 px-4">
                            <a href="{{ route('admin.users.add') }}"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Thêm mới</a>
                            <a href="{{ route('admin.user.list') }}"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Danh
                                sách</a>
                        </div>
                    </div>
                </nav>
            </aside>

            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>

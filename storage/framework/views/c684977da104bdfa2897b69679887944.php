<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="flex">
            <aside class="w-64 min-h-screen bg-white shadow">
                <nav class="mt-5 px-2">
                    <a href="<?php echo e(route('dashboard')); ?>"
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
                            <a href="<?php echo e(route('admin.product.list')); ?>"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Danh sách</a>
                            <a href="<?php echo e(route('admin.category.list')); ?>"
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
                            <a href="<?php echo e(route('admin.users.add')); ?>"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Thêm mới</a>
                            <a href="<?php echo e(route('admin.user.list')); ?>"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Danh
                                sách</a>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full px-4 py-2 mt-2 text-sm font-medium text-gray-800 rounded-md hover:bg-gray-100 focus:outline-none">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                    viewBox="0 0 32 32">
                                    <path
                                        d="M 15 4 C 14.476563 4 13.941406 4.183594 13.5625 4.5625 C 13.183594 4.941406 13 5.476563 13 6 L 13 7 L 7 7 L 7 9 L 8 9 L 8 25 C 8 26.644531 9.355469 28 11 28 L 23 28 C 24.644531 28 26 26.644531 26 25 L 26 9 L 27 9 L 27 7 L 21 7 L 21 6 C 21 5.476563 20.816406 4.941406 20.4375 4.5625 C 20.058594 4.183594 19.523438 4 19 4 Z M 15 6 L 19 6 L 19 7 L 15 7 Z M 10 9 L 24 9 L 24 25 C 24 25.554688 23.554688 26 23 26 L 11 26 C 10.445313 26 10 25.554688 10 25 Z M 12 12 L 12 23 L 14 23 L 14 12 Z M 16 12 L 16 23 L 18 23 L 18 12 Z M 20 12 L 20 23 L 22 23 L 22 12 Z">
                                    </path>
                                </svg>
                                <span>Trashed</span>
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="mt-2 space-y-2 px-4">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-md">Đã xóa </a>

                        </div>
                    </div>
                </nav>
            </aside>

            <main class="flex-1 p-8">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
<?php /**PATH /Applications/AMPPS/www/laravel/ecommerce/resources/views/layouts/admin.blade.php ENDPATH**/ ?>
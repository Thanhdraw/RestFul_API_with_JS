@extends('customers.index')



@section('content')

<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container px-4 mx-auto">

        </div>
    </nav>

    <div class="container px-4 py-8 mx-auto">
        <div class="flex flex-col gap-8 md:flex-row">
            <!-- Sidebar -->
            <aside class="w-full md:w-64">
                <div class="sticky p-6 bg-white shadow-xl rounded-2xl top-8">
                    <h2 class="mb-6 text-xl font-bold text-gray-800">
                        Danh mục sản phẩm
                    </h2>
                    <nav>
                        <ul class="space-y-3">
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-3 space-x-3 text-gray-700 transition duration-300 rounded-xl hover:bg-blue-50 hover:text-blue-600">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                    <span>Điện thoại</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-3 space-x-3 text-gray-700 transition duration-300 rounded-xl hover:bg-blue-50 hover:text-blue-600">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                    <span>Laptop</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-3 space-x-3 text-gray-700 transition duration-300 rounded-xl hover:bg-blue-50 hover:text-blue-600">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full"></span>
                                    <span>Máy tính bảng</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-3 space-x-3 text-gray-700 transition duration-300 rounded-xl hover:bg-blue-50 hover:text-blue-600">
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                    <span>Tai nghe</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Price Filter -->
                    <div class="mt-8">
                        <h3 class="mb-4 text-lg font-semibold text-gray-800">
                            Lọc theo giá
                        </h3>
                        <div class="space-y-2">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" class="text-blue-600 rounded form-checkbox" />
                                <span class="text-gray-600">Dưới 5 triệu</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" class="text-blue-600 rounded form-checkbox" />
                                <span class="text-gray-600">5 - 10 triệu</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" class="text-blue-600 rounded form-checkbox" />
                                <span class="text-gray-600">10 - 20 triệu</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" class="text-blue-600 rounded form-checkbox" />
                                <span class="text-gray-600">Trên 20 triệu</span>
                            </label>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1">
                <!-- Breadcrumb -->
                <div class="flex items-center mb-6 space-x-2 text-sm text-gray-600">
                    <a href="#" class="hover:text-blue-600">Trang chủ</a>
                    <span>/</span>
                    <span class="font-medium text-gray-900">Tất cả sản phẩm</span>
                </div>
                <!DOCTYPE html>
                <html lang="vi">
                <!-- ... (giữ nguyên phần head) ... -->

                <body class="bg-gradient-to-br from-gray-50 to-gray-100">
                    <!-- ... (giữ nguyên phần navigation) ... -->

                    <div class="container px-4 py-8 mx-auto">
                        <!-- Brand Navigation -->
                        <div class="mb-8">

                        </div>
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                            <!-- Row 1 -->
                            <!-- Product 1 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="iPhone" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full top-4 right-4">
                                        -15%
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        iPhone 15 Pro Max
                                    </h3>
                                    <p class="mb-2 text-gray-600">256GB, Titan</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">34.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 2 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="MacBook"
                                        class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-blue-500 rounded-full top-4 right-4">
                                        Mới
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        MacBook Pro M3
                                    </h3>
                                    <p class="mb-2 text-gray-600">512GB SSD</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">45.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 3 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="iPad" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full top-4 right-4">
                                        Trả góp 0%
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        iPad Pro M2
                                    </h3>
                                    <p class="mb-2 text-gray-600">256GB, WiFi</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">28.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 4 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="AirPods"
                                        class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-orange-500 rounded-full top-4 right-4">
                                        Hot
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        AirPods Pro 2
                                    </h3>
                                    <p class="mb-2 text-gray-600">Sạc không dây</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">6.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <!-- Product 5 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Samsung"
                                        class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-purple-500 rounded-full top-4 right-4">
                                        Quà tặng
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        Samsung S24 Ultra
                                    </h3>
                                    <p class="mb-2 text-gray-600">
                                        512GB, Titanium
                                    </p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">32.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 6 -->
                            <!-- Tiếp tục từ Product 6 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Dell" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full top-4 right-4">
                                        -10%
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        Dell XPS 15
                                    </h3>
                                    <p class="mb-2 text-gray-600">i9, 32GB RAM</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">48.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 7 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Sony" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full top-4 right-4">
                                        Mới về
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        Sony WH-1000XM5
                                    </h3>
                                    <p class="mb-2 text-gray-600">Chống ồn</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">8.490.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 8 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Gaming" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-blue-500 rounded-full top-4 right-4">
                                        Gaming
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        ROG Strix G16
                                    </h3>
                                    <p class="mb-2 text-gray-600">RTX 4070</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">39.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <!-- Product 9 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Watch" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-purple-500 rounded-full top-4 right-4">
                                        Độc quyền
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        Apple Watch Ultra 2
                                    </h3>
                                    <p class="mb-2 text-gray-600">Titanium, GPS</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">22.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 10 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Camera" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-orange-500 rounded-full top-4 right-4">
                                        Hot
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        Sony A7 IV
                                    </h3>
                                    <p class="mb-2 text-gray-600">Full-frame</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">54.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 11 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Tablet" class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full top-4 right-4">
                                        -20%
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        Galaxy Tab S9
                                    </h3>
                                    <p class="mb-2 text-gray-600">256GB, S Pen</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">19.990.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 12 -->
                            <div
                                class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                <div class="relative">
                                    <img src="/api/placeholder/300/200" alt="Speaker"
                                        class="object-cover w-full h-48" />
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full top-4 right-4">
                                        Mới
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-bold text-gray-800">
                                        HomePod 2
                                    </h3>
                                    <p class="mb-2 text-gray-600">Spatial Audio</p>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-sm text-yellow-400">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-blue-600">8.490.000₫</span>
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center mt-12 space-x-2">
                            <button class="px-4 py-2 text-gray-500 border rounded-lg hover:bg-gray-50">
                                Trước
                            </button>
                            <button class="px-4 py-2 text-white bg-blue-600 border rounded-lg">
                                1
                            </button>
                            <button class="px-4 py-2 text-gray-700 border rounded-lg hover:bg-gray-50">
                                2
                            </button>
                            <button class="px-4 py-2 text-gray-700 border rounded-lg hover:bg-gray-50">
                                3
                            </button>
                            <button class="px-4 py-2 text-gray-500 border rounded-lg hover:bg-gray-50">
                                Sau
                            </button>
                        </div>
            </main>
        </div>
    </div>
</body>

@endsection
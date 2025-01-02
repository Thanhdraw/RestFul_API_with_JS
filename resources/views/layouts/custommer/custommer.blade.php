<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phone Store - Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>

<body>
    <!-- Header -->
    <header class="text-white bg-gray-900">
        <nav class="container px-6 py-4 mx-auto">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="text-xl font-bold">
                    <a href="#">Phone Store</a>
                </div>

                <!-- Menu Links -->
                <div class="items-center hidden space-x-8 md:flex">
                    <a href="#" class="hover:text-gray-300">Trang chủ</a>
                    <a href="#" class="hover:text-gray-300">Sản phẩm</a>
                    <a href="#" class="hover:text-gray-300">Khuyến mãi</a>
                    <a href="#" class="hover:text-gray-300">Liên hệ</a>
                </div>

                <!-- Search and User Actions -->
                <div class="flex items-center space-x-6">
                    <!-- Search Bar -->
                    <div class="relative">
                        <input type="text"
                            class="py-2 pl-10 pr-4 text-white bg-gray-800 rounded-full w-60 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Tìm kiếm sản phẩm" />
                        <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-3 top-1/2"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19a8 8 0 110-16 8 8 0 010 16zm0 0l4 4m-4-4l-4-4"></path>
                        </svg>
                    </div>

                    <!-- User Icon (Login/Register) -->
                    <a href="#" class="hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm0 4v12h14V7H5z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <section class="bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="container px-6 py-16 mx-auto">
            <div class="flex flex-col items-center md:flex-row">
                <div class="text-white md:w-1/2">
                    <h1 class="mb-4 text-4xl font-bold md:text-6xl">
                        Điện thoại chính hãng
                    </h1>
                    <p class="mb-8 text-xl text-gray-200">
                        Khám phá bộ sưu tập điện thoại mới nhất với giá tốt
                        nhất thị trường
                    </p>
                    <div class="space-x-4">
                        <button
                            class="px-8 py-3 font-bold text-blue-600 transition duration-300 bg-white rounded-lg hover:bg-gray-100">
                            Mua ngay
                        </button>
                        <button
                            class="px-8 py-3 font-bold text-white transition duration-300 border-2 border-white rounded-lg hover:bg-white hover:text-blue-600">
                            Tìm hiểu thêm
                        </button>
                    </div>
                    <div class="flex items-center mt-8 space-x-6">
                        <div>
                            <p class="text-3xl font-bold">10K+</p>
                            <p class="text-gray-200">Khách hàng</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold">24/7</p>
                            <p class="text-gray-200">Hỗ trợ</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold">100%</p>
                            <p class="text-gray-200">Chính hãng</p>
                        </div>
                    </div>
                </div>
                <div class="relative mt-8 md:w-1/2 md:mt-0">
                    <div class="relative z-10">
                        <img src="https://cdn.hoanghamobile.com/i/content/Uploads/2023/12/14/iphone-15-pro-max-natural-titanium-1-hhm.jpg"
                            alt="Latest Phones" class="rounded-lg shadow-2xl w-200px h-200px" />
                        <div class="absolute p-4 bg-white rounded-lg shadow-lg -bottom-4 -right-4">
                            <div class="flex items-center">
                                <div class="w-3 h-3 mr-2 bg-green-500 rounded-full"></div>
                                <p class="font-bold text-gray-800">
                                    Flash Sale đang diễn ra
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute top-0 right-0 bg-purple-300 rounded-full w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                    </div>
                    <div
                        class="absolute left-0 bg-blue-300 rounded-full -bottom-8 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- san pham noi bat -->
    <!-- Featured Products Section -->
    <section class="container px-6 py-12 mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold">Sản phẩm nổi bật</h2>
            <div class="flex space-x-2">
                <button class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
                <button class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
            <!-- Product Card 1 -->
            <div
                class="flex flex-col h-full overflow-hidden transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                <div class="relative">
                    <img src="https://cdn.hoanghamobile.com/i/content/Uploads/2023/12/14/iphone-15-pro-max-natural-titanium-1-hhm.jpg"
                        alt="iPhone 15 Pro Max" class="object-cover w-full h-64" />
                    <span
                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full top-4 right-4">-15%</span>
                </div>
                <div class="flex flex-col flex-grow p-6">
                    <div class="flex-grow">
                        <h3 class="mb-2 text-xl font-bold">
                            iPhone 15 Pro Max
                        </h3>
                        <p class="mb-4 text-gray-600">
                            256GB - Titan Tự Nhiên
                        </p>
                        <div class="flex items-baseline mb-4">
                            <span class="text-2xl font-bold text-blue-600">34.990.000₫</span>
                            <span class="ml-2 text-sm text-gray-500 line-through">39.990.000₫</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="ml-1 text-gray-500">4.9 (256)</span>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full py-3 mt-auto font-bold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                        Thêm vào giỏ
                    </button>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div
                class="flex flex-col h-full overflow-hidden transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                <div class="relative">
                    <img src="https://product.hstatic.net/200000409445/product/3_95c54066ba184e7b971052f3ad2b5bc6_master.jpg"
                        alt="Samsung Galaxy S24 Ultra" class="object-cover w-full h-64" />
                    <span
                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full top-4 right-4">Mới</span>
                </div>
                <div class="flex flex-col flex-grow p-6">
                    <div class="flex-grow">
                        <h3 class="mb-2 text-xl font-bold">
                            Samsung Galaxy S24 Ultra
                        </h3>
                        <p class="mb-4 text-gray-600">256GB - Xám Titan</p>
                        <div class="flex items-baseline mb-4">
                            <span class="text-2xl font-bold text-blue-600">31.990.000₫</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="ml-1 text-gray-500">4.8 (189)</span>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full py-3 mt-auto font-bold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                        Thêm vào giỏ
                    </button>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div
                class="flex flex-col h-full overflow-hidden transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                <div class="relative">
                    <img src="https://product.hstatic.net/200000409445/product/3_95c54066ba184e7b971052f3ad2b5bc6_master.jpg"
                        alt="Samsung Galaxy S24 Ultra" class="object-cover w-full h-64" />
                    <span
                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full top-4 right-4">Mới</span>
                </div>
                <div class="flex flex-col flex-grow p-6">
                    <div class="flex-grow">
                        <h3 class="mb-2 text-xl font-bold">
                            Samsung Galaxy S24 Ultra
                        </h3>
                        <p class="mb-4 text-gray-600">256GB - Xám Titan</p>
                        <div class="flex items-baseline mb-4">
                            <span class="text-2xl font-bold text-blue-600">31.990.000₫</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="ml-1 text-gray-500">4.8 (189)</span>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full py-3 mt-auto font-bold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                        Thêm vào giỏ
                    </button>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div
                class="flex flex-col h-full overflow-hidden transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                <div class="relative">
                    <img src="https://product.hstatic.net/200000409445/product/3_95c54066ba184e7b971052f3ad2b5bc6_master.jpg"
                        alt="Samsung Galaxy S24 Ultra" class="object-cover w-full h-64" />
                    <span
                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full top-4 right-4">Mới</span>
                </div>
                <div class="flex flex-col flex-grow p-6">
                    <div class="flex-grow">
                        <h3 class="mb-2 text-xl font-bold">
                            Samsung Galaxy S24 Ultra
                        </h3>
                        <p class="mb-4 text-gray-600">256GB - Xám Titan</p>
                        <div class="flex items-baseline mb-4">
                            <span class="text-2xl font-bold text-blue-600">31.990.000₫</span>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span class="ml-1 text-gray-500">4.8 (189)</span>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full py-3 mt-auto font-bold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                        Thêm vào giỏ
                    </button>
                </div>
            </div>

            <!-- Các card khác tương tự... -->
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container px-6 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold">
                    Tại sao chọn Phone Store?
                </h2>
                <p class="max-w-2xl mx-auto text-gray-600">
                    Chúng tôi cam kết mang đến trải nghiệm mua sắm tốt nhất
                    với những ưu đãi độc quyền chỉ có tại Phone Store
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Feature 1 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <div class="flex items-center justify-center mb-6 bg-blue-100 rounded-full w-14 h-14">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold">
                        Giao hàng siêu tốc
                    </h3>
                    <p class="text-gray-600">
                        Giao hàng trong 2h với đơn hàng nội thành. Giao hàng
                        toàn quốc từ 1-3 ngày.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800">
                            Tìm hiểu thêm
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <div class="flex items-center justify-center mb-6 bg-green-100 rounded-full w-14 h-14">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold">
                        Bảo hành chính hãng
                    </h3>
                    <p class="text-gray-600">
                        Bảo hành chính hãng 12 tháng, 1 đổi 1 trong 30 ngày
                        nếu lỗi từ nhà sản xuất.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center font-medium text-green-600 hover:text-green-800">
                            Xem chính sách
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <div class="flex items-center justify-center mb-6 bg-purple-100 rounded-full w-14 h-14">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold">
                        Thanh toán linh hoạt
                    </h3>
                    <p class="text-gray-600">
                        Hỗ trợ nhiều hình thức thanh toán: COD, chuyển
                        khoản, trả góp 0%.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center font-medium text-purple-600 hover:text-purple-800">
                            Xem hướng dẫn
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <div class="flex items-center justify-center mb-6 bg-red-100 rounded-full w-14 h-14">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-3 text-xl font-bold">Hỗ trợ 24/7</h3>
                    <p class="text-gray-600">
                        Đội ngũ tư vấn viên chuyên nghiệp, hỗ trợ khách hàng
                        24/7.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center font-medium text-red-600 hover:text-red-800">
                            Liên hệ ngay
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container px-6 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold">Sản phẩm mới</h2>
                <p class="max-w-2xl mx-auto text-gray-600">
                    Khám phá những sản phẩm mới nhất và hot nhất tại Phone
                    Store!
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <!-- Product 1 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <img class="object-cover w-full h-56 mb-4 rounded-lg" src="path/to/product-image.jpg"
                        alt="Sản phẩm 1" />
                    <h3 class="mb-2 text-xl font-semibold">Sản phẩm 1</h3>
                    <p class="mb-4 text-gray-600">
                        Mô tả ngắn gọn về sản phẩm 1
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-blue-600">1.500.000 VND</span>
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Xem chi tiết</a>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <img class="object-cover w-full h-56 mb-4 rounded-lg" src="path/to/product-image.jpg"
                        alt="Sản phẩm 2" />
                    <h3 class="mb-2 text-xl font-semibold">Sản phẩm 2</h3>
                    <p class="mb-4 text-gray-600">
                        Mô tả ngắn gọn về sản phẩm 2
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-blue-600">2.000.000 VND</span>
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Xem chi tiết</a>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <img class="object-cover w-full h-56 mb-4 rounded-lg" src="path/to/product-image.jpg"
                        alt="Sản phẩm 3" />
                    <h3 class="mb-2 text-xl font-semibold">Sản phẩm 3</h3>
                    <p class="mb-4 text-gray-600">
                        Mô tả ngắn gọn về sản phẩm 3
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-blue-600">1.800.000 VND</span>
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Xem chi tiết</a>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <img class="object-cover w-full h-56 mb-4 rounded-lg" src="path/to/product-image.jpg"
                        alt="Sản phẩm 4" />
                    <h3 class="mb-2 text-xl font-semibold">Sản phẩm 4</h3>
                    <p class="mb-4 text-gray-600">
                        Mô tả ngắn gọn về sản phẩm 4
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-blue-600">2.500.000 VND</span>
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section -->
    <section class="py-16 text-white bg-gray-800">
        <div class="container px-6 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold">Đăng ký nhận tin mới</h2>
            <p class="mb-8 text-lg">
                Cập nhật những sản phẩm mới nhất và các chương trình khuyến
                mãi chỉ có tại Phone Store
            </p>

            <form action="#" method="POST" class="flex items-center justify-center">
                <input type="email" placeholder="Nhập email của bạn" class="p-3 text-gray-700 rounded-l-lg w-80"
                    required />
                <button type="submit" class="p-3 text-white bg-blue-600 rounded-r-lg hover:bg-blue-700">
                    Đăng ký
                </button>
            </form>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="py-16 bg-gray-50">
        <div class="container px-6 mx-auto text-center">
            <h2 class="mb-8 text-3xl font-bold">
                Khách hàng nói gì về chúng tôi?
            </h2>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Review 1 -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <p class="mb-4 text-gray-600">
                        "Dịch vụ tuyệt vời, giao hàng nhanh chóng và sản
                        phẩm chất lượng. Tôi rất hài lòng!"
                    </p>
                    <div class="flex items-center justify-center">
                        <img src="path/to/avatar1.jpg" alt="Customer 1" class="w-12 h-12 mr-4 rounded-full" />
                        <div>
                            <p class="font-semibold">Nguyễn Văn A</p>
                            <p class="text-gray-500">Hà Nội</p>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <p class="mb-4 text-gray-600">
                        "Sản phẩm chất lượng, giá cả hợp lý. Tôi chắc chắn
                        sẽ quay lại mua thêm!"
                    </p>
                    <div class="flex items-center justify-center">
                        <img src="path/to/avatar2.jpg" alt="Customer 2" class="w-12 h-12 mr-4 rounded-full" />
                        <div>
                            <p class="font-semibold">Trần Thị B</p>
                            <p class="text-gray-500">TP.HCM</p>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <p class="mb-4 text-gray-600">
                        "Dịch vụ hỗ trợ khách hàng rất chuyên nghiệp và
                        nhiệt tình. Sản phẩm giao đúng hẹn."
                    </p>
                    <div class="flex items-center justify-center">
                        <img src="path/to/avatar3.jpg" alt="Customer 3" class="w-12 h-12 mr-4 rounded-full" />
                        <div>
                            <p class="font-semibold">Lê Thị C</p>
                            <p class="text-gray-500">Đà Nẵng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-gray-300 bg-gray-900">
        <!-- Newsletter Section -->
        <div class="border-b border-gray-800">
            <div class="container px-4 py-12 mx-auto">
                <div class="grid items-center grid-cols-1 gap-8 md:grid-cols-2">
                    <div>
                        <h3 class="mb-2 text-2xl font-bold text-white">
                            Đăng ký nhận thông tin
                        </h3>
                        <p class="text-gray-400">
                            Nhận thông tin về sản phẩm mới và khuyến mãi đặc
                            biệt
                        </p>
                    </div>
                    <div>
                        <form class="flex gap-4">
                            <input type="email" placeholder="Nhập email của bạn"
                                class="flex-1 px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500" />
                            <button
                                class="px-6 py-3 text-white transition-colors duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                                Đăng ký
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="container px-4 py-12 mx-auto">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
                <!-- Company Info -->
                <div>
                    <h4 class="mb-6 text-lg font-bold text-white">
                        Về Phone Store
                    </h4>
                    <p class="mb-4 text-gray-400">
                        Chuỗi cửa hàng điện thoại uy tín hàng đầu Việt Nam
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="mb-6 text-lg font-bold text-white">
                        Thông tin
                    </h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Về chúng
                                tôi</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Tuyển
                                dụng</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Tin
                                tức</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Khuyến
                                mãi</a>
                        </li>
                    </ul>
                </div>

                <!-- Help -->
                <div>
                    <h4 class="mb-6 text-lg font-bold text-white">
                        Hỗ trợ
                    </h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Hướng dẫn
                                mua hàng</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Chính sách
                                bảo hành</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Chính sách
                                đổi trả</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-white">Giao hàng
                                & Thanh toán</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="mb-6 text-lg font-bold text-white">
                        Liên hệ
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400">123 Nguyễn Văn Linh, Quận 7, TP.HCM</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-gray-400">1900 1234</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-gray-400">support@phonestore.com</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800">
            <div class="container px-4 py-6 mx-auto">
                <div class="flex flex-col items-center justify-between md:flex-row">
                    <div class="text-sm text-gray-400">
                        © 2024 Phone Store. Tất cả quyền được bảo lưu.
                    </div>
                    <div class="flex items-center mt-4 space-x-4 md:mt-0">
                        <img src="/api/placeholder/40/25" alt="Payment Method" class="h-6" />
                        <img src="/api/placeholder/40/25" alt="Payment Method" class="h-6" />
                        <img src="/api/placeholder/40/25" alt="Payment Method" class="h-6" />
                        <img src="/api/placeholder/40/25" alt="Payment Method" class="h-6" />
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Rest of your HTML code -->

</html>
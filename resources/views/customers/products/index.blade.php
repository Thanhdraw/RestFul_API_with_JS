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
                            @if (!empty($products))
                                @foreach ($products as $product) 
                                    <div
                                        class="overflow-hidden transition duration-300 transform bg-white shadow-lg group rounded-2xl hover:scale-105">
                                        <div class="relative">
                                            <a href="{{route('shop.detail', $product->id)}}"
                                                class="block w-full h-64 overflow-hidden">
                                                <img class="object-cover h-56 mx-auto" src="{{ $product->image }}" alt="ảnh" />
                                            </a>
                                            <div
                                                class="absolute px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full top-4 right-4">
                                                -15%
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="mb-2 text-lg font-bold text-gray-800">
                                                {{ $product->name }}
                                            </h3>
                                            <p class="mb-2 text-gray-600">{{ $product->description }}</p>
                                            <div class="flex items-center mb-2">
                                                <div class="flex text-sm text-yellow-400">
                                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <span
                                                    class="text-lg font-bold text-blue-600">{{number_format($product->price) . " " . '₫'}}</span>
                                                <button
                                                    class="px-4 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                                    Mua ngay
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @else
                                <p>Khong tim thay san pham</p>
                            @endif



                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center mt-12 space-x-2">
                            @if ($products->onFirstPage())
                                <button disabled class="px-4 py-2 text-gray-300 border rounded-lg cursor-not-allowed">
                                    Previous
                                </button>
                            @else
                                <a href="{{ $products->previousPageUrl() }}"
                                    class="px-4 py-2 text-gray-500 border rounded-lg hover:bg-gray-50">
                                    Previous
                                </a>
                            @endif

                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                                    <a href="{{ $products->url($i) }}" class="{{ $i == $products->currentPage()
                                ? 'px-4 py-2 text-white bg-blue-600 border rounded-lg'
                                : 'px-4 py-2 text-gray-500 border rounded-lg hover:bg-gray-50' }}">
                                                        {{ $i }}
                                                    </a>
                            @endfor

                            @if ($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}"
                                    class="px-4 py-2 text-gray-500 border rounded-lg hover:bg-gray-50">
                                    Next
                                </a>
                            @else
                                <button disabled class="px-4 py-2 text-gray-300 border rounded-lg cursor-not-allowed">
                                    Next
                                </button>
                            @endif
                        </div>
            </main>
        </div>
    </div>
</body>

@endsection
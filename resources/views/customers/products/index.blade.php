@extends('customers.index')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 w-full bg-white shadow-lg">
        <div class="container px-4 mx-auto max-w-7xl lg:px-8">
            <!-- Nav content here -->
        </div>
    </nav>

    <div class="container px-4 py-6 mx-auto max-w-7xl lg:px-8 lg:py-8">
        <!-- Main content wrapper -->
        <div class="flex flex-col gap-6 lg:flex-row">
            <!-- Sidebar -->

            <aside class="w-full lg:w-80">
                <div class="sticky p-5 bg-white shadow-xl rounded-2xl lg:p-7 top-20">
                    <div class="mb-6">
                        <form action="{{ route('shop.search', request()->input('keyword')) }}" method="get">
                            @csrf
                            <div class="mb-6">
                                <div class="relative">
                                    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..."
                                        class="w-full px-4 py-2.5 pr-10 text-sm text-gray-700 border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-100 focus:outline-none">
                                    <button type="submit" class="absolute -translate-y-1/2 right-3 top-1/2">
                                        <svg class="w-5 h-5 text-gray-400 transition-colors hover:text-blue-500"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-6">
                                <h3 class="mb-4 text-lg font-semibold text-gray-800">Lọc theo giá</h3>

                                <!-- Predefined price ranges -->
                                <div class="mb-4 space-y-3">
                                    <label class="flex items-center space-x-3">
                                        <input type="radio" name="price_range" value="0-5000000" {{ request()->input('price_range') == '0-5000000' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700">Dưới 5 triệu</span>
                                    </label>
                                    <label class="flex items-center space-x-3">
                                        <input type="radio" name="price_range" value="5000000-10000000" {{ request()->input('price_range') == '5000000-10000000' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700">5 - 10 triệu</span>
                                    </label>
                                    <label class="flex items-center space-x-3">
                                        <input type="radio" name="price_range" value="10000000-20000000" {{ request()->input('price_range') == '10000000-20000000' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700">10 - 20 triệu</span>
                                    </label>
                                    <label class="flex items-center space-x-3">
                                        <input type="radio" name="price_range" value="20000000-50000000" {{ request()->input('price_range') == '20000000-50000000' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700">Trên 20 triệu</span>
                                    </label>
                                    <label class="flex items-center space-x-3">
                                        <input type="radio" name="price_range" value="50000000-999999999" {{ request()->input('price_range') == '50000000-999999999' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700">Trên 50 triệu</span>
                                    </label>
                                </div>

                                <!-- Custom price range -->


                                <!-- Apply filters button -->
                                <button type="submit"
                                    class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Áp dụng bộ lọc
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="flex items-center justify-between lg:block">
                        <h2 class="text-xl font-bold text-gray-800">Danh mục sản phẩm</h2>
                        <button class="p-2 rounded-lg lg:hidden hover:bg-gray-100" onclick="toggleSidebar()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7">
                                </path>
                            </svg>
                        </button>
                    </div>

                    @if (!empty($categories))
                        <nav class="hidden lg:block mt-7" id="sidebarMenu">
                            <ul class="space-y-3">
                                <li>
                                    <a href="{{ route('shop.products') }}"
                                        class="flex items-center px-4 py-3 space-x-3 text-gray-700 transition duration-200 rounded-xl hover:bg-blue-50 hover:text-blue-600">
                                        <span class="w-2.5 h-2.5 rounded-full"></span>
                                        <span>Tổng hợp</span>
                                    </a>
                                </li>
                                @foreach ($categories as $item)
                                    <li>
                                        <a href="{{ route('shop.category', ['id' => $item->id]) }}"
                                            class="flex items-center px-4 py-3 space-x-3 text-gray-700 transition duration-200 rounded-xl hover:bg-blue-50 hover:text-blue-600">
                                            <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                                            <span>{{ $item->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    @else
                        <p>Không tìm thấy danh mục</p>
                    @endif
                </div>
            </aside>

            <!-- Main content area -->
            <main class="flex-1">
                <!-- Breadcrumb -->
                <div class="flex items-center mb-6 space-x-2 text-sm text-gray-600">
                    <a href="{{ route('shop.index') }}" class="hover:text-blue-600">Trang chủ</a>
                    <span>/</span>
                    <span class="font-medium text-gray-900">Tất cả sản phẩm</span>
                </div>
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold text-gray-800 md:text-3xl group">
                        <span class="inline-block transition-colors duration-300 hover:text-blue-600">
                            Danh mục {{ $title ?? $category->name ?? "tìm kiếm " . "$keyword" }}
                        </span>
                    </h2>


                    <div class="mt-1 h-0.5 w-0 group-hover:w-full bg-blue-600 transition-all duration-300"></div>
                </div>
                <!-- Products grid -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 md:gap-6">


                    @if (!empty($products))

                        @foreach ($products as $product)
                            <div
                                class="flex flex-col h-full overflow-hidden transition duration-300 bg-white shadow-md rounded-xl hover:shadow-lg">
                                <!-- Product image container -->
                                <div class="relative aspect-w-16 aspect-h-12">
                                    <a href="{{ route('shop.detail', $product->id) }}">
                                        <img class="object-cover w-full h-full" src="{{ $product->image }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div
                                        class="absolute px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full top-3 right-3">
                                        -15%
                                    </div>
                                </div>
                                @if(session('success'))
                                    <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded"
                                        role="alert">
                                        <strong class="font-bold">Thành công!</strong>
                                        <span class="block sm:inline">{{ session('success') }}</span>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                                        role="alert">
                                        <strong class="font-bold">Lỗi!</strong>
                                        <span class="block sm:inline">{{ session('error') }}</span>
                                    </div>
                                @endif

                                <!-- Product info -->
                                <div class="flex flex-col flex-1 p-4">
                                    <div class="flex-1">
                                        <h3 class="mb-2 text-base font-semibold text-gray-800 line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="mb-3 text-sm text-gray-600 line-clamp-2">
                                            {{ $product->description }}
                                        </p>

                                        <!-- Rating -->
                                        <div class="flex items-center mb-3">
                                            <div class="flex text-sm text-yellow-400">
                                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price and button - now in a separate div at the bottom -->
                                    <div class="mt-auto">
                                        <span class="block mb-3 text-lg font-bold text-blue-600">
                                            {{ number_format($product->price) . ' ' . '₫' }}
                                        </span>
                                        <button
                                            class="w-full py-2 text-sm font-medium text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <p class="py-8 text-center text-gray-500 col-span-full">Không tìm thấy sản phẩm</p>
                    @endif

                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-center mt-8 space-x-2">
                    @if ($products->onFirstPage())
                        <button disabled class="px-4 py-2 text-sm text-gray-300 border rounded-lg cursor-not-allowed">
                            Previous
                        </button>
                    @else
                        <a href="{{ $products->previousPageUrl() }}"
                            class="px-4 py-2 text-sm text-gray-500 border rounded-lg hover:bg-gray-50">
                            Previous
                        </a>
                    @endif

                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    <a href="{{ $products->url($i) }}" class="{{ $i == $products->currentPage()
                        ? 'px-4 py-2 text-sm text-white bg-blue-600 border rounded-lg'
                        : 'px-4 py-2 text-sm text-gray-500 border rounded-lg hover:bg-gray-50' }}">
                                        {{ $i }}
                                    </a>
                    @endfor

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}"
                            class="px-4 py-2 text-sm text-gray-500 border rounded-lg hover:bg-gray-50">
                            Next
                        </a>
                    @else
                        <button disabled class="px-4 py-2 text-sm text-gray-300 border rounded-lg cursor-not-allowed">
                            Next
                        </button>
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
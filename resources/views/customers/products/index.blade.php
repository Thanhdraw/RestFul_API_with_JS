@extends('customers.index')



@section('content')

    <!-- Main container with responsive padding -->
    <!-- Main container with increased max-width -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 w-full bg-white shadow-lg">
            <div class="container max-w-7xl px-4 lg:px-8 mx-auto">
                <!-- Nav content here -->
            </div>
        </nav>

        <div class="container max-w-7xl mx-auto px-4 lg:px-8 py-8 lg:py-10">
            <!-- Main content wrapper with increased spacing -->
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
                <!-- Sidebar - Wider on desktop -->
                @include('customers.category.index')


                <!-- Main content area -->
                <main class="flex-1">
                    <!-- Breadcrumb with increased spacing -->
                    <div class="flex items-center space-x-2.5 text-sm text-gray-600 mb-8">
                        <a href="#" class="hover:text-blue-600">Trang chủ</a>
                        <span>/</span>
                        <span class="font-medium text-gray-900">Tất cả sản phẩm</span>
                    </div>

                    <!-- Products grid with increased spacing and larger cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7">
                        @if (!empty($products))
                            @foreach ($products as $product)
                                <div
                                    class="bg-white rounded-2xl shadow-lg overflow-hidden transition duration-300 transform hover:scale-102 hover:shadow-xl">
                                    <div class="relative">
                                        <a href="{{ route('shop.detail', $product->id) }}"
                                            class="block aspect-w-16 aspect-h-10">
                                            <img class="object-cover w-full h-full" src="{{ $product->image }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                        <div
                                            class="absolute top-4 right-4 px-4 py-1.5 text-sm font-semibold text-white bg-red-500 rounded-full">
                                            -15%
                                        </div>
                                    </div>
                                    <div class="p-5 lg:p-6">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-gray-600 mb-3 line-clamp-2">{{ $product->description }}</p>
                                        <div class="flex items-center mb-4">
                                            <div class="flex text-yellow-400 space-x-0.5">
                                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span
                                                class="text-xl font-bold text-blue-600">{{ number_format($product->price) . ' ' . '₫' }}</span>
                                            <button
                                                class="px-5 py-2.5 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700 transition duration-200">
                                                Mua ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="col-span-full text-center text-gray-500 py-10">Không tìm thấy sản phẩm</p>
                        @endif
                    </div>

                    <!-- Pagination with increased spacing -->
                    <div class="flex justify-center items-center mt-10 lg:mt-12 space-x-2">
                        @if ($products->onFirstPage())
                            <button disabled class="px-4 py-2.5 text-sm text-gray-300 border rounded-lg cursor-not-allowed">
                                Previous
                            </button>
                        @else
                            <a href="{{ $products->previousPageUrl() }}"
                                class="px-4 py-2.5 text-sm text-gray-500 border rounded-lg hover:bg-gray-50">
                                Previous
                            </a>
                        @endif

                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <a href="{{ $products->url($i) }}"
                                class="{{ $i == $products->currentPage()
                                    ? 'px-4 py-2.5 text-sm text-white bg-blue-600 border rounded-lg'
                                    : 'px-4 py-2.5 text-sm text-gray-500 border rounded-lg hover:bg-gray-50' }}">
                                {{ $i }}
                            </a>
                        @endfor

                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}"
                                class="px-4 py-2.5 text-sm text-gray-500 border rounded-lg hover:bg-gray-50">
                                Next
                            </a>
                        @else
                            <button disabled class="px-4 py-2.5 text-sm text-gray-300 border rounded-lg cursor-not-allowed">
                                Next
                            </button>
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Simple JavaScript for mobile sidebar toggle -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarMenu');
            const priceFilter = document.getElementById('priceFilter');
            sidebar.classList.toggle('hidden');
            priceFilter.classList.toggle('hidden');
        }
    </script>

@endsection

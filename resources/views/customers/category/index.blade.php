


<aside class="w-full lg:w-80">
    <div class="sticky p-5 bg-white shadow-xl rounded-2xl lg:p-7 top-20">
        <div class="flex items-center justify-between lg:block">
            <h2 class="text-xl font-bold text-gray-800">Danh mục sản phẩm</h2>
            <button class="p-2 rounded-lg lg:hidden hover:bg-gray-100" onclick="toggleSidebar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        @if (!empty($categories))
            <nav class="hidden lg:block mt-7" id="sidebarMenu">
                <ul class="space-y-3">
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
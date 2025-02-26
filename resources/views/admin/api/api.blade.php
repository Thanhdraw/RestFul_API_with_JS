@extends('layouts.admin')

@section('content')

    <body class="p-6 bg-gray-100">
        <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-lg">
            <h1 class="mb-4 text-3xl font-bold text-gray-800">Danh sách sản phẩm</h1>

            <!-- Ô tìm kiếm sản phẩm -->
            <div class="flex items-center mb-4">
                <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm..."
                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button onclick="searchProducts()"
                    class="px-4 py-2 ml-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Tìm
                </button>
            </div>

            <button onclick="openCreateProductModal()"
                class="px-6 py-2 mt-5 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                Tạo mới
            </button>

            <ul id="product-list" class="space-y-4"></ul>
            <div id="pagination" class="flex justify-center mt-6"></div>
        </div>


        <!-- Modal -->
        <div id="productModal"
            class="fixed inset-0 flex items-center justify-center hidden transition-opacity bg-black bg-opacity-50">
            <div class="relative p-6 transition-all transform scale-95 bg-white rounded-lg shadow-xl w-96">
                <!-- Nút đóng -->
                <button onclick="closeModal()" class="absolute text-gray-600 top-2 right-2 hover:text-red-500">
                    ✖
                </button>

                <h2 id="product_name" class="text-2xl font-bold text-gray-900"></h2>
                <h3 id="id_product" class="text-2xl font-bold text-gray-900"></h3>
                <img id="product_image" src="" alt="Hình ảnh sản phẩm"
                    class="object-cover w-auto h-56 mx-auto my-4 rounded-lg shadow-sm">
                <p id="product_price" class="text-lg font-semibold text-gray-700"></p>
                <p id="product_description" class="text-gray-600"></p>

                <button onclick="closeModal()"
                    class="px-6 py-2 mt-5 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                    Đóng
                </button>
            </div>
        </div>


        <!-- Modal Chỉnh Sửa -->
        <div id="editModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h2 class="mb-4 text-xl font-semibold">Chỉnh sửa sản phẩm</h2>
                <input type="hidden" id="edit_id">
                <div class="mb-2">
                    <label class="block">Tên sản phẩm</label>
                    <input type="text" id="edit_name" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Giá</label>
                    <input type="number" id="edit_price" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Category</label>
                    <input type="number" id="edit_category" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Slug</label>
                    <input type="text" id="edit_slug" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Mô tả</label>
                    <textarea id="edit_description" class="w-full px-2 py-1 border rounded"></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button onclick="closeEditModal()" class="px-4 py-2 bg-gray-400 rounded">Hủy</button>
                    <button onclick="updateProductUI()" class="px-4 py-2 text-white bg-blue-500 rounded">Lưu</button>
                </div>
            </div>
        </div>
        <!-- Modal tạo mới -->

        <div id="createModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h2 class="mb-4 text-xl font-semibold">Tạo sản phẩm</h2>
                <div class="mb-2">
                    <label class="block">Tên sản phẩm</label>
                    <input type="text" id="create_name" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Giá</label>
                    <input type="number" id="create_price" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Category</label>
                    <input type="number" id="create_category" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Slug</label>
                    <input type="text" id="create_slug" class="w-full px-2 py-1 border rounded">
                </div>
                <div class="mb-2">
                    <label class="block">Mô tả</label>
                    <textarea id="create_description" class="w-full px-2 py-1 border rounded"></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button onclick="closeCreateModal()" class="px-4 py-2 bg-gray-400 rounded">Hủy</button>
                    <button onclick="createProductHandler()" class="px-4 py-2 text-white bg-blue-500 rounded">Lưu</button>
                </div>
            </div>
        </div>


        <div id="pagination" class="flex justify-center mt-4 space-x-2"></div>

    </body>

@endsection
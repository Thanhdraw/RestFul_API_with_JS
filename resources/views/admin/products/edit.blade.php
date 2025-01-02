@extends('layouts.admin')

@section('content')

<div class="container p-4 mx-auto">

    <h2 class="mb-4 text-2xl font-bold">Edit Product</h2>
    <a href="{{ route('admin.product.list') }}" class="inline-block px-4 py-2 mb-4 text-white bg-blue-500 rounded-md">
        Back
    </a>

    <!-- Hiển thị thông báo thành công nếu có -->
    @if(session('success'))
        <div class="p-3 mb-4 text-white bg-green-500 rounded ">
            {{ session('success') }}
        </div>
    @endif

    <form action=" {{ route('admin.product.update', ['id' => $product->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tên sản phẩm -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                class="block w-full p-2 mt-1 border rounded-md" required>
        </div>

        <!-- Giá sản phẩm -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}"
                class="block w-full p-2 mt-1 border rounded-md" required>
        </div>


        <!-- Danh mục -->
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category_id" name="category_id" class="block w-full p-2 mt-1 border rounded-md" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Ảnh sản phẩm -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="text" id="image" name="image" value="{{ old('image', $product->image) }}"
                class="block w-full p-2 mt-1 border rounded-md">
        </div>

        <!-- Slug -->
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}"
                class="block w-full p-2 mt-1 border rounded-md" required>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4"
                class="block w-full p-2 mt-1 border rounded-md">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Nút Submit -->
        <div class="mb-4">
            <button type="submit" class="p-2 text-white bg-blue-500 rounded-md">Update Product</button>
        </div>
    </form>
</div>
@endsection
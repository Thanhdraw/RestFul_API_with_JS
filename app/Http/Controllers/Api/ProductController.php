<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm (có phân trang).
     */
    public function index()
    {
        return response()->json(Product::paginate(10));
    }

    /**
     * Tìm kiếm sản phẩm theo tên.
     */
    public function search(Request $request)
    {
        $query = $request->query('q');

        if (!$query) {
            return response()->json([
                'products' => [],
                'message' => 'Vui lòng nhập từ khóa tìm kiếm'
            ], 400);
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json(['products' => $products]);
    }

    /**
     * Thêm sản phẩm mới.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($request->name);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Thêm sản phẩm thành công',
            'product' => $product
        ], 201);
    }

    /**
     * Lấy thông tin sản phẩm theo ID.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        return response()->json($product);
    }

    /**
     * Cập nhật sản phẩm.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => ['required', 'numeric', 'regex:/^\d{1,13}(\.\d{1,2})?$/'],
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($request->name);

        $product->update($validated);

        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công',
            'product' => $product
        ]);
    }

    /**
     * Xóa sản phẩm.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        try {
            $product->delete();
            return response()->json(['message' => 'Sản phẩm đã được xóa thành công']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi trong quá trình xóa sản phẩm', 'error' => $e->getMessage()], 500);
        }
    }
}

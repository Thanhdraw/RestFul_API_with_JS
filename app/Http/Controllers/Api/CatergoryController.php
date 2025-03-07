<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CatergoryController extends Controller
{
    //
    public function index()
    {
        return response()->json(Category::paginate(10));
    }

    /**
     * Tìm kiếm sản phẩm theo tên.
     */
    public function search(Request $request)
    {
        $query = $request->query('q');

        if (!$query) {
            return response()->json([
                'categories' => [],
                'message' => 'Vui lòng nhập từ khóa tìm kiếm'
            ], 400);
        }

        $categories = Category::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json(['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Tạo slug từ name
        $validated['slug'] = Str::slug($request->name);


        $category = Category::create($validated);

        return response()->json([
            'message' => 'Thêm loại sản phẩm thành công',
            'category' => $category // Đổi từ 'catergory' thành 'category'
        ], 201);
    }

    /**
     * Lấy thông tin sản phẩm theo ID.
     */
    public function show(string $id)
    {
        $product = Category::find($id);

        if (!$product) {
            return response()->json(['message' => 'Loại sản phẩm không tồn tại'], 404);
        }

        return response()->json($product);
    }


    public function update(Request $request, string $id)
    {
        $catergory = Category::find($id);
        if (!$catergory) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $validated['slug'] = Str::slug($request->name);

        $catergory->update($validated);

        return response()->json([
            'message' => 'Cập nhật loại sản phẩm thành công',
            'catergory' => $catergory
        ]);
    }

    public function destroy(string $id)
    {
        $catergory = Category::find($id);

        if (!$catergory) {
            return response()->json(['message' => 'Loại Sản phẩm không tồn tại'], 404);
        }

        try {
            $catergory->delete();
            return response()->json(['message' => 'Loại Sản phẩm đã được xóa thành công']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi trong quá trình xóa loại sản phẩm', 'error' => $e->getMessage()], 500);
        }
    }

}

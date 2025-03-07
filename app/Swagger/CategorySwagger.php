<?php

namespace App\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @OA\Tag(
 *     name="Categories",
 *     description="API endpoints for managing categories"
 * )
 */
class CategorySwagger extends Controller
{
    /**
     * @OA\Get(
     *     path="/categories",
     *     tags={"Categories"},
     *     summary="Get list of categories",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer", default=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Category"))
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Category::paginate(10));
    }

    /**
     * @OA\Get(
     *     path="/categories/search",
     *     tags={"Categories"},
     *     summary="Search categories by name",
     *     @OA\Parameter(
     *         name="q",
     *         in="query",
     *         required=true,
     *         description="Search query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful operation")
     * )
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

    /**
     * @OA\Get(
     *     path="/categories/{id}",
     *     tags={"Categories"},
     *     summary="Get a single category",
     *     @OA\Parameter(name="id", in="path", required=true, description="Category ID", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Category not found")
     * )
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Loại sản phẩm không tồn tại'], 404);
        }

        return response()->json($category);
    }

    /**
     * @OA\Post(
     *     path="/categories",
     *     tags={"Categories"},
     *     summary="Create a new category",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     ),
     *     @OA\Response(response=201, description="Category created successfully")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['slug'] = Str::slug($request->name);
        $category = Category::create($validated);

        return response()->json([
            'message' => 'Thêm loại sản phẩm thành công',
            'category' => $category
        ], 201);
    }

    /**
     * @OA\Put(
     *     path="/categories/{id}",
     *     tags={"Categories"},
     *     summary="Update an existing category",
     *     @OA\Parameter(name="id", in="path", required=true, description="Category ID", @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Category")),
     *     @OA\Response(response=200, description="Category updated successfully"),
     *     @OA\Response(response=404, description="Category not found")
     * )
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Loại sản phẩm không tồn tại'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['slug'] = Str::slug($request->name);
        $category->update($validated);

        return response()->json([
            'message' => 'Cập nhật loại sản phẩm thành công',
            'category' => $category
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/categories/{id}",
     *     tags={"Categories"},
     *     summary="Delete a category",
     *     @OA\Parameter(name="id", in="path", required=true, description="Category ID", @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Category deleted successfully"),
     *     @OA\Response(response=404, description="Category not found")
     * )
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Loại sản phẩm không tồn tại'], 404);
        }

        try {
            $category->delete();
            return response()->json(['message' => 'Loại sản phẩm đã được xóa thành công'], 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi trong quá trình xóa loại sản phẩm', 'error' => $e->getMessage()], 500);
        }
    }
}
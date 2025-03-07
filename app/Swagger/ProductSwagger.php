<?php

namespace App\Swagger;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\contact;

use function Laravel\Prompts\error;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 *     description="API Documentation for Product and User"
 * )
 */

/**
 * @OA\Server(
 *  description="Local API Server",
 * url="http://127.0.0.1:8000/api/"
 *)
 */
/**
 * @OA\Tag(
 *     name="Products",
 *     description="API Endpoints for Products"
 * )
 */
class ProductSwagger extends Controller
{
    /**
     * @OA\Get(
     *     path="/products/search",
     *     summary="Search products by name",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="q",
     *         in="query",
     *         required=true,
     *         description="Search query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful search operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="products", type="array", @OA\Items(ref="#/components/schemas/Product"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request - missing search query",
     *         @OA\JsonContent(
     *             @OA\Property(property="products", type="array", @OA\Items()),
     *             @OA\Property(property="message", type="string", example="Vui lòng nhập từ khóa tìm kiếm")
     *         )
     *     )
     * )
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

        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * @OA\Get(
     *     path="/products",
     *     summary="Get list of products with pagination",
     *     tags={"Products"},
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
     *         @OA\JsonContent(
     *             @OA\Property(property="current_page", type="integer", example=1),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product")),
     *             @OA\Property(property="from", type="integer", example=1),
     *             @OA\Property(property="last_page", type="integer", example=1),
     *             @OA\Property(property="per_page", type="integer", example=10),
     *             @OA\Property(property="to", type="integer", example=10),
     *             @OA\Property(property="total", type="integer", example=10)
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Product::paginate(10)); // Trả về JSON chuẩn
    }

    /**
     * @OA\Post(
     *     path="/products",
     *     summary="Create a new product",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price", "category_id", "slug"},
     *             @OA\Property(property="name", type="string", example="Product name"),
     *             @OA\Property(property="price", type="number", format="float", example=100.00),
     *             @OA\Property(property="image", type="string", example="image_url.jpg"),
     *             @OA\Property(property="category_id", type="integer", example=1),
     *             @OA\Property(property="slug", type="string", example="product-name"),
     *             @OA\Property(property="description", type="string", example="Product description")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Thêm sản phẩm thành công"),
     *             @OA\Property(property="product", ref="#/components/schemas/Product")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'slug' => 'required|string|unique:products,slug|max:255',
            'description' => 'nullable|string',
        ]);
        $product = Product::create($validated);
        return response()->json(['message' => 'Thêm sản phẩm thành công', 'product' => $product], 201);
    }

    /**
     * @OA\Get(
     *     path="/products/{id}",
     *     summary="Get a specific product by ID",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Product not found")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    /**
     * @OA\Put(
     *     path="/products/{id}",
     *     summary="Update an existing product",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price", "category_id", "slug"},
     *             @OA\Property(property="name", type="string", example="Updated product name"),
     *             @OA\Property(property="price", type="number", format="float", example=150.00),
     *             @OA\Property(property="image", type="string", example="updated_image_url.jpg"),
     *             @OA\Property(property="category_id", type="integer", example=1),
     *             @OA\Property(property="slug", type="string", example="updated-product-name"),
     *             @OA\Property(property="description", type="string", example="Updated product description")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Cập nhật sản phẩm thành công"),
     *             @OA\Property(property="product", ref="#/components/schemas/Product")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Sản phẩm không tồn tại")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);

        }
        $request->validate([
            'name' => 'required|string|max:255',
            // Tối đa 13 chữ số trước dấu thập phân và tối đa 2 
            // chữ số sau dấu thập phân
            'price' => [
                'required',
                'numeric',
                'regex:/^\d{1,13}(\.\d{1,2})?$/',
            ],
            'category_id' => 'required',
            'image' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $product = Product::find($id);
        $image = $request->input('image') ?: $product->image;
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'image' => $image,
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
        ]);
        return response()->json(['message' => 'Cập nhật sản phẩm thành công', 'product' => $product], 200);
    }

    /**
     * @OA\Delete(
     *     path="/products/{id}",
     *     summary="Delete a product",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Sản phẩm đã được xóa thành công")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Sản phẩm không tồn tại")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Server error")
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        try {
            //code...
            if (!$product) {
                return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
            }
            $product->delete();
            return response()->json(['message' => 'Sản phẩm đã được xóa thành công']);
        } catch (\Throwable $th) {
            //throw $th;
            throw $th;
        }
    }
}
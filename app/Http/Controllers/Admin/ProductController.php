<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //


    // product - CRUD
    public function listProduct()
    {
        try {
            $message = "";
            $products = Product::paginate(10);
            $categories = Category::all();
            if (count($products) == 0) {
                $message = "Khong tim thay san pham nao";
            }
            return view('admin.products.list', compact('products'))
                ->with('categories', $categories)
                ->with('message', $message);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    public function storeProduct(Request $request)
    {

        // dd($request->all());

        try {
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
            $image = $request->input('image') ?: 'default_image.png';

            $product = Product::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'image' => $image,
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
            ]);
            if ($product) {
                return redirect()->back()->with('success', 'Them thanh cong');
            } else {
                return redirect()->back()->with('error', 'Them that bai');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi  ' . $e->getMessage());
        }

    }

    public function editProduct($id)
    {

        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));

    }

    public function updateProduct(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => ['required', 'numeric', 'regex:/^\d{1,13}(\.\d{1,2})?$/'],
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'slug' => 'required|string|unique:products,slug,',
            ]);

            $product = Product::find($id);
            if (!$product) {
                return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
            }

            $product->update($request->all());

            return response()->json(['message' => 'Cập nhật thành công!', 'product' => $product], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi: ' . $e->getMessage()], 500);
        }
    }




    public function deleteProduct($id)
    {
        try {
            $product = Product::findorFail($id);
            $product->delete();
            return redirect()->back()->with('success', 'Xoa thanh cong');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi  ' . $e->getMessage());
        }
    }
}

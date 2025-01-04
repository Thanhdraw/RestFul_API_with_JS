<?php

namespace App\Http\Controllers\ShopController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //

    public function show($id = "", $search = "", $sort = "")
    {

        $categories = Category::all();
        try {
            if ($id == "") {
                $products = Product::paginate(12);
                $title = "Tất cả sản phẩm";
            } else {
                $products = Product::where('category_id', $id)->paginate(12);
                $title = Category::find($id)->name;
            }

            return view('customers.products.index', compact('products', 'categories', 'title'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }



    }

    public function search(Request $request)
    {
        try {
            $request->validate([
                'keyword' => 'nullable|string|max:255',
                'price_range' => 'nullable|string|max:255',
                'checked' => 'nullable'
            ]);

            $keyword = $request->input('keyword') ?? '';
            $price_range = $request->input('price_range') ?? '';

            // Khởi tạo truy vấn cơ bản
            $query = Product::query();

            // Điều kiện tìm kiếm theo từ khóa
            if (!empty($keyword)) {
                $query->where('name', 'like', '%' . $keyword . '%');
            }

            // Điều kiện tìm kiếm theo khoảng giá
            if (!empty($price_range)) {
                // Tách giá trị khoảng giá
                $prices = explode('-', $price_range);
                if (count($prices) == 2 && is_numeric($prices[0]) && is_numeric($prices[1]) && $prices[0] < $prices[1]) {
                    $query->whereBetween('price', [$prices[0], $prices[1]]);
                }
            }

            // Lấy danh mục
            $categories = Category::all();

            // Lấy sản phẩm và phân trang
            $products = $query->paginate(100);

            // Kiểm tra nếu không tìm thấy sản phẩm
            if ($products->isEmpty()) {
                return view('customers.products.index', compact('products', 'categories', 'keyword', 'price_range'))
                    ->with('error', 'Không tìm thấy sản phẩm với từ khóa: ' . $keyword);
            }

            // Trả về view với thông báo tìm thấy sản phẩm
            return view('customers.products.index', compact('products', 'categories', 'keyword', 'price_range'))
                ->with('success', 'Tìm thấy sản phẩm với từ khóa: ' . $keyword);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function detailProduct($id)
    {
        try {
            $products = Product::find($id);
            return view('customers.products.detail', compact('products'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}

<?php

namespace App\Http\Controllers\ShopController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //

    public function show($id = "")
    {
        try {
            if ($id == "") {
                $products = Product::paginate(12);
            } else {
                $products = Product::where('category_id', $id)->paginate(12);
            }

            return view('customers.products.index', compact('products'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function category()
    {
        try {
            $categories = Category::all();
            return view('customers.products.index', compact('categories'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return view('customers.products.index', ['categories' => [], 'error' => 'Không thể tải danh mục.']);
        }
    }



    public function detailProduct($id)
    {
        $products = Product::findOrFail($id);
        return view('customers.products.detail', compact('products'));
    }
    public function getCatergory($id)
    {
        try {
            $products = Product::where('category_id', $id)->paginate(12);
            return view('customers.products.index', compact('products'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

<?php

namespace App\Http\Controllers\ShopController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function show()
    {
        try {
            $products = Product::paginate(12);
            return view('customers.products.index', compact('products'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function detailProduct($id)
    {
        $products = Product::findOrFail($id);
        return view('customers.products.detail', compact('products'));
    }
}

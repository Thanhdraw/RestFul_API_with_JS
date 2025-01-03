<?php

namespace App\Http\Controllers\ShopController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('customers.index');
    }

    public function listProducts()
    {
        return view('customers.products.index');
    }
}

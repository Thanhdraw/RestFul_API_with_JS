<?php

namespace App\Http\Controllers\ShopController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cart()
    {
        return view('customers.cart.index');
    }
}

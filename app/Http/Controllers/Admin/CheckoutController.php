<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        return view('admin.checkout.index');
    }

    public function checkoutDetails($id)
    {
        try {
            // Hiển thị giá trị $id
            $id = (int) $id;

            $details = OrderItem::where('order_id', $id)->get();
            $getName = Order::with('user')->find($id);
            $info_user = [
                'order_id' => $getName->id,
                'id' => $getName->user->id,
                'name' => $getName->user->name,
                'email' => $getName->user->email,
                'phone' => $getName->user->phone,
                'address' => $getName->user->address,
            ];


            if (!$details) {
                return response()->json(['error' => 'Không tìm thấy OrderItem'], 404);
            }
            // $details->load('items.product');


            if ($details) {
                return view('admin.checkout.details', compact('details', 'info_user'));
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}

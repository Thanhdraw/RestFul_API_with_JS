<?php

namespace App\Http\Controllers\ShopController;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        DB::beginTransaction(); // Bắt đầu giao dịch
        try {
            // Lấy giỏ hàng và tổng giá
            $cart = Cart::getContent();
            $total = Cart::getTotal();

            // Kiểm tra nếu giỏ hàng rỗng
            if ($cart->isEmpty()) {
                return redirect()->back()->with('error', 'Cart is empty');
            }

            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'Pending',
            ]);

            // Thêm các sản phẩm vào đơn hàng
            foreach ($cart as $item) {
                // Sử dụng create để lưu dữ liệu vào bảng order_items
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_name = $item->name; // Lưu tên sản phẩm
                $orderItem->quantity = $item->quantity; // Lưu số lượng
                $orderItem->price = $item->price; // Lưu giá
                $orderItem->save();
            }

            // Xóa giỏ hàng sau khi tạo đơn
            Cart::clear();

            DB::commit(); // Cam kết giao dịch

            // Thông báo thành công và chuyển hướng đến trang đơn hàng
            return redirect()->route('shop.order')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack(); // Hủy giao dịch nếu có lỗi

            // Thông báo lỗi cho người dùng
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    //
    public function generateInvoice($orderId)
    {
        // Lấy đơn hàng
        $order = Order::with('items.product')->findOrFail($orderId); // Kèm theo thông tin sản phẩm

        // Kiểm tra xem hóa đơn đã được tạo chưa
        if ($order->invoice) {
            return redirect()->route('order.show', $orderId)->with('error', 'Invoice has already been generated.');
        }

        // Tạo hóa đơn mới
        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->invoice_number = 'INV-' . Str::random(8); // Mã hóa đơn ngẫu nhiên
        $invoice->total_amount = $order->total_amount; // Lấy tổng số tiền từ đơn hàng
        $invoice->save();

        return view('invoices.show', compact('invoice', 'order'));
    }
}

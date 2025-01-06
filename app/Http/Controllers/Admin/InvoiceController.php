<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Psy\Formatter\DocblockFormatter;

use PDF;
class InvoiceController extends Controller
{
    //
    public function generateInvoice($orderId)
    {
        // Lấy đơn hàng
        $order = Order::with('items.product')->findOrFail($orderId); // Kèm theo thông tin sản phẩm
        // Kiểm tra xem hóa đơn đã được tạo chưa
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        if ($order->invoice) {
            return redirect()->route('order.show', $orderId)->with('error', 'Invoice has already been generated.');
        }
        // dd($order);
        // Tạo hóa đơn mới
        $invoice = new Invoice();


        $invoice->order_id = $order->id;
        $invoice->user_id = $order->user_id;
        $invoice->total_amount = $order->total;
        $invoice->status = 'Pending';
        $invoice->invoice_number = 'INV-' . Str::random(8);
        // dd($invoice);
        $invoice->save();

        return view('admin.invoices.show', compact('invoice', 'order'));
    }
    // public function generatePDF($invoiceId)
    // {
    //     $invoice = Invoice::with('order.items.product')->findOrFail($invoiceId);
    //     $getinfo = OrderItem::with('items.product')->findOrFail($invoice->order_id);
    //     $order = $invoice->order;
    //     dd($getinfo);
    //     // Tạo view PDF
    //     $pdf = PDF::loadView('admin.invoices.pdf', compact('invoice', 'order'));

    //     // Xuất PDF trực tiếp hoặc tải về
    //     return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
    // }
}

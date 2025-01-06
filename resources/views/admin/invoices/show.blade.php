@extends('layouts.admin')

@section('content')
<div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-lg">
    <h1 class="mb-4 text-2xl font-bold">Invoice: {{ $invoice->invoice_number }}</h1>
    <p class="text-lg"><strong>Order ID:</strong> {{ $invoice->order_id }}</p>
    <p class="mb-4 text-lg"><strong>Total Amount:</strong> {{ $invoice->total_amount }} VND</p>
    <p class="mb-6 text-lg"><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>

    <h3 class="mb-4 text-xl font-semibold">Order Details</h3>
    <table class="min-w-full border-collapse table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left border border-gray-300">Product Name</th>
                <th class="px-4 py-2 text-left border border-gray-300">Quantity</th>
                <th class="px-4 py-2 text-left border border-gray-300">Price</th>
                <th class="px-4 py-2 text-left border border-gray-300">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">{{ $item->product_name ?? 'Không có sản phẩm' }}</td>
                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                    <td class="px-4 py-2">{{ number_format($item->price) }} VND</td>
                    <td class="px-4 py-2">{{ number_format($item->quantity * $item->price) }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 text-center">
        <a href="{{ route('invoice.pdf', $invoice->id) }}"
            class="px-6 py-3 text-white bg-blue-600 rounded-md hover:bg-blue-700">
            Download Invoice as PDF
        </a>
    </div>
    <div class="mt-6 text-center">
        <p class="text-lg font-medium">Thank you for your purchase!</p>
    </div>
</div>
@endsection
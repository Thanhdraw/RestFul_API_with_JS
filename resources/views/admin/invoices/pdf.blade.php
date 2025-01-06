<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice: {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .total {
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <h1>Invoice: {{ $invoice->invoice_number }}</h1>
        <p><strong>Order ID:</strong> {{ $invoice->order_id }}</p>
        <p><strong>Total Amount:</strong> {{ $invoice->total_amount }} VND</p>
        <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>

        <h3>Order Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name ?? 'Không có sản phẩm' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }} VND</td>
                        <td>{{ number_format($item->quantity * $item->price) }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <p><strong>Total Amount:</strong> {{ number_format($invoice->total_amount) }} VND</p>
        </div>

        <p>Thank you for your purchase!</p>
    </div>
</body>

</html>
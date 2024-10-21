<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .invoice-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .header p {
            font-size: 14px;
            color: #777;
        }

        .customer-info,
        .order-summary {
            margin-bottom: 20px;
        }

        .customer-info h3,
        .order-summary h3 {
            font-size: 18px;
            color: #333;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 8px;
        }

        .order-details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-details th, .order-details td {
            padding: 12px;
            text-align: left;
            border: 1px solid #eaeaea;
        }

        .order-details th {
            background-color: #f8f8f8;
        }

        .total-table {
            width: 100%;
            margin-top: 20px;
        }

        .total-table th,
        .total-table td {
            padding: 8px 12px;
            text-align: right;
        }

        .total-table th {
            text-align: left;
            background-color: #f8f8f8;
            border-bottom: 1px solid #eaeaea;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <!-- Header Section -->
    <div class="header">
        <h1>Order Invoice</h1>
        <p>Order ID: #{{ $order_detail->id }} | Date: {{ $order_detail->created_at->format('M d, Y') }}</p>
    </div> 

    <!-- Customer Information Section -->
    <div class="customer-info">
        <h3>Customer Information</h3>
        <p>
            <strong>Name:</strong> {{ $order_detail->billing_address->name }}<br>
            <strong>Email:</strong> {{ $order_detail->billing_address->email }}<br>
            <strong>Address:</strong> {{ $order_detail->billing_address->address }}, {{ $order_detail->billing_address->street_address }}, {{ $order_detail->billing_address->city }}, {{ $order_detail->billing_address->pincode }}, {{ $order_detail->billing_address->state }}, {{ $order_detail->billing_address->country }}<br>
            <strong>Phone:</strong> {{ $order_detail->billing_address->contact_number }}
        </p>
    </div>

    <!-- Order Summary Section -->
    <div class="order-summary">
        <h3>Order Summary</h3>
        <table class="order-details">
            <thead>
            <tr> 
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order_detail->order_items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Additional Charges and Fees -->
    <table class="total-table">
        @if($order_detail->point_price)
        <tr>
            <th>Points:</th>
            <td>-${{ $order_detail->point_price }}</td>
        </tr>
        @endif
        @if($order_detail->shiping_charges)
        <tr>
            <th>Postage And Handling Charges:</th>
            <td>${{ $order_detail->shiping_charges }}</td>
        </tr>
        @endif
        @if($order_detail->insurance_fee)
        <tr>
            <th>International And Local Insurance:</th>
            <td>${{ $order_detail->insurance_fee }}</td>
        </tr>
        @endif
        @if($order_detail->admin_fee)
        <tr>
            <th>Admin Fees:</th>
            <td>${{ $order_detail->admin_fee }}</td>
        </tr>
        @endif
        @if($order_detail->total_tax)
        <tr>
            <th>Tax:</th>
            <td>${{ $order_detail->total_tax }}</td>
        </tr>
        @endif
        <tr>
            <th>Sub Total:</th>
            <td>${{ $order_detail->sub_total }}</td>
        </tr>
        <tr>
            <th><strong>Total:</strong></th>
            <td><strong>${{ number_format($order_detail->order_amount, 2) }}</strong></td>
        </tr>
    </table>

    <!-- Footer Section -->
    <div class="footer">
        <p>Thank you for your purchase!</p>
        <p>If you have any questions, feel free to contact us at support@52orange.com</p>
    </div>
</div>

</body>
</html>

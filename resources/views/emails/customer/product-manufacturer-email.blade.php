<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product SKU Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #eaeaea;
        }

        .email-header h1 {
            font-size: 24px;
            color: #333;
        }

        .email-header p {
            font-size: 14px;
            color: #777;
        }

        .email-body {
            margin: 20px 0;
            line-height: 1.6;
            font-size: 16px;
            color: #333;
        }

        .email-body p {
            margin: 10px 0;
        }

        .email-body strong {
            color: #333;
        }

        .email-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 2px solid #eaeaea;
            font-size: 12px;
            color: #999;
        }

        .product-details-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .product-details-table th, .product-details-table td {
            padding: 12px;
            border: 1px solid #eaeaea;
            text-align: left;
        }

        .product-details-table th {
            background-color: #f9f9f9;
            font-weight: bold;
            color: #555;
        }

        .product-details-table td {
            background-color: #fff;
        }
    </style>
</head>
<body>

<div class="email-container">
    <!-- Email Header -->
    <div class="email-header">
        <h1>Product Details</h1>
        <p>Please check the product details below.</p>
    </div>

    <!-- Email Body -->
    <div class="email-body">
        <table class="product-details-table">
            <tr>
                <th>Product Name</th>
                <td>{{ $MailData['product_name'] }}</td>
            </tr>
            <tr>
                <th>Product SKU Number</th>
                <td>{{ $MailData['product_sku_number'] }}</td>
            </tr>
            <tr>
                <th>Product Price</th>
                <td>{{ $MailData['product_price']; }}</td>
            </tr>
        </table>

        <h3>Customer Details</h3>
        <table class="product-details-table">
            <tr>
                <th>Customer Name</th>
                <td>{{ $MailData['customer_name'] }}</td>
            </tr>
            <tr>
                <th>Customer Email</th>
                <td>{{ $MailData['customer_email'] }}</td>
            </tr>
            <tr>
                <th>Customer Mobile Number</th>
                <td>{{ $MailData['customer_mobile'] }}</td>
            </tr>
        </table>
    </div>

    <!-- Email Footer -->
    <div class="email-footer">
        <p>Thanks for choosing our services!</p>
        <p>If you have any questions, feel free to contact us.</p>
    </div>
</div>

</body>
</html>
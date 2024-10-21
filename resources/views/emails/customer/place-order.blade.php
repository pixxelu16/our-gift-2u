<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place New Order</title>
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

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #F39519;
            color: #000;
            text-decoration: none;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #F39519;
        }
    </style>
</head>
<body>

<div class="email-container">
    <!-- Email Header -->
    <div class="email-header">
        <h1>Order Confirmation</h1>
        <p>Thank you for your purchase, {{ $MailData['customer_name'] }}!</p>
    </div>

    <!-- Email Body -->
    <div class="email-body">
        <p>We have successfully received your order.</p>
        
        <p><strong>Order ID:</strong> {{ $MailData['order_id'] }}</p>
        <p><strong>Total Amount:</strong> {{ $MailData['total_amount']; }}</p>
        
        <p>We are preparing your order and will notify you once it has been shipped.</p>
        
        <p>For any questions regarding your order, feel free to contact us.</p>
    </div>

    <!-- Button (optional) -->
    <div class="email-body" style="text-align: center;">
        <a href="{{ $MailData['order_link'] }}" class="button">View Order</a>
    </div>

    <!-- Email Footer -->
    <div class="email-footer">
        <p>Thank you for shopping with us!</p>
        <p>If you have any issues or concerns, contact our support team at support@52orange.com</p>
    </div>
</div>

</body>
</html>

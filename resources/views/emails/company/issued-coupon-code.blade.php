<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333333;
        }
        table {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        td {
            padding: 20px;
        }
        h1 {
            color: #333333;
            font-size: 24px;
            font-weight: bold;
            margin: 0 0 15px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 4px;
        }
        .coupon {
            font-size: 28px;
            font-weight: bold;
            background-color: #f8f9fa;
            border: 2px dashed #28a745;
            padding: 15px;
            display: inline-block;
            color: #28a745;
            letter-spacing: 2px;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888888;
            padding: 20px;
        }
    </style>
</head>
<body>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color: #28a745; color: white; padding: 20px;">
                            <h1>Here's Coupon Code</h1>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td>
                            <p>Hi,</p>
                            <div class="coupon"><strong>Coupon Code: </strong> {{ $mail_data['coupon_code'] ?? ""; }}</div>
                        </td>
                    </tr>
                
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

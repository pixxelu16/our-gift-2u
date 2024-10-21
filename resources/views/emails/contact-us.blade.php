<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }

        .email-container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #0073e6;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        .content {
            padding: 20px;
        }

        .content h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #555;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .contact-info {
            margin-bottom: 25px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .contact-info p {
            margin: 8px 0;
        }

        .contact-info strong {
            color: #333;
            font-weight: bold;
        }

        .contact-item {
            margin-bottom: 15px;
        }

        .footer {
            text-align: center;
            padding-top: 20px;
            color: #999;
            font-size: 12px;
        }

        .footer a {
            color: #0073e6;
            text-decoration: none;
        }

        /* Add some responsive styling */
        @media (max-width: 600px) {
            .email-container {
                padding: 15px;
            }
            .header h1 {
                font-size: 24px;
            }
            .content h3 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <h3>Hello Admin,</h3>
            <p>You have received a new inquiry through the contact form. Below are the details:</p>

            <!-- Contact Information Section -->
            <div class="contact-info">
                <div class="contact-item">
                    <p><strong>First Name:</strong> {{ $MailData['first_name'] }}</p>
                </div>
                <div class="contact-item">
                    <p><strong>Last Name:</strong> {{ $MailData['last_name'] }}</p>
                </div>
                <div class="contact-item">
                    <p><strong>Email:</strong> {{ $MailData['email'] }}</p>
                </div>
                <div class="contact-item">
                    <p><strong>Phone Number:</strong> {{ $MailData['phone_number'] }}</p>
                </div>
                <div class="contact-item">
                    <p><strong>Message:</strong> {{ $MailData['message'] }}</p>
                </div>
            </div>

            <p>Please follow up with this inquiry at your earliest convenience. Thank you!</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            <p><a href="{{ url('/') }}">Visit our website</a></p>
        </div>
    </div>

</body>
</html>

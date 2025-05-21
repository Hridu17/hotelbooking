<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            padding: 30px 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .card h2 {
            color: #28a745;
            margin-bottom: 10px;
        }

        .card p {
            margin: 10px 0 20px;
            color: #555;
        }

        .details {
            text-align: left;
            margin-bottom: 25px;
        }

        .details li {
            list-style: none;
            margin: 8px 0;
        }

        .details strong {
            display: inline-block;
            width: 150px;
            color: #333;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>🎉 Payment Successful</h2>
        <p>Thank you for your booking. Here are your payment details:</p>

        <ul class="details">
            <li><strong>Booking ID:</strong> {{ $booking->id ?? 'N/A' }}</li>
            <li><strong>Amount Paid:</strong> {{ $amount ?? 'N/A' }}</li>
            <li><strong>Transaction Code:</strong> {{ $transaction_code ?? 'N/A' }}</li>
        </ul>

        <a href="{{ url('/') }}" class="btn">Return to Home</a>
    </div>

</body>

</html>

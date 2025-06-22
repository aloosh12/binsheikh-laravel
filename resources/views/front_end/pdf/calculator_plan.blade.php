<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 5px;
            /*background-color: #f9f9f9;*/
            /*color: #333;*/
            position: relative;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            /*background: #fff;*/
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .watermark {
            position: absolute;
            opacity: 0.7;
            z-index: 0;
            width: 100%;
            height: 60%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .content {
            position: relative;
            z-index: 1;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo img {
            height: 80px;
        }
        .divider {
            border: none;
            border-top: 2px solid #c0a96e;
            margin: 20px 0;
        }
        .title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin: 40px 0;
            color: #333;
        }
        .property-name {
            text-align: center;
            font-size: 20px;
            color: #666;
            margin-bottom: 30px;
        }
        .property-details {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f8f8f8;
        }
        .payment-highlight {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Watermark Image -->
    <img class="watermark" src="{{$waterMarkBase64}}" alt="Watermark">

    <div class="content">
        <div class="header">
            <div class="logo">
                <img src="{{$logoBase64}}" alt="Bin Al Sheikh Real Estate Brokerage Logo">
            </div>
        </div>
        <hr class="divider">
        <div class="title">Custom Payment Plan</div>
        <div class="property-name">{{ $property->name }}</div>

        <div class="property-details">
            <h3>Property Details</h3>
            <table>
                <thead>
                <tr>
                    <th>Unit Number</th>
                    <th>Gross Area</th>
                    <th>Size Net</th>
                    <th>Full Price</th>
                    <th>Management Fees</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $property->apartment_no }}</td>
                    <td>{{ $property->gross_area }}</td>
                    <td>{{ $property->area }} m2</td>
                    <td>{{ moneyFormat($full_price) }}</td>
                    <td>{{ moneyFormat($ser_amt) }}</td>
                    <td>{{ moneyFormat($total) }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div>
            <h3>Custom Payment Terms</h3>
            <p><strong>Down Payment:</strong> {{ moneyFormat($down_payment) }} ({{ number_format($downPaymentPercentage, 2) }}%)</p>
            <p><strong>Payment Duration:</strong> {{ $rental_duration }} months</p>
        </div>

        <h3>Payment Schedule</h3>
        <table>
            <thead>
            <tr>
                <th>Payment</th>
                <th>Month</th>
                <th>Amount</th>
                <th>Percentage</th>
            </tr>
            </thead>
            <tbody>
            <tr class="payment-highlight">
                <td>Down Payment</td>
                <td>{{ date('M-y') }}</td>
                <td>{{ moneyFormat($down_payment) }}</td>
                <td>{{ number_format($downPaymentPercentage, 2) }}%</td>
            </tr>
            <tr class="payment-highlight">
                <td>Management Fees</td>
                <td>{{ date('M-y') }}</td>
                <td>{{ moneyFormat($ser_amt) }}</td>
                <td></td>
            </tr>
            @foreach($months as $mnth)
                <tr>
                    <td>{{ $mnth['ordinal'] }} Installment</td>
                    <td>{{ $mnth['month'] }}</td>
                    <td>{{ moneyFormat($mnth['payment']) }}</td>
                    <td>{{ $mnth['total_percentage'] }}%</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>This document is for informational purposes only and does not constitute a binding agreement.</p>
            <p>&copy; {{ date('Y') }} Bin Al Sheikh Real Estate Brokerage. All rights reserved.</p>
            <p>Generated on {{ date('d-m-Y H:i:s') }}</p>
        </div>
    </div>
</div>
</body>
</html>

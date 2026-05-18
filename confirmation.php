<?php
session_start();
// Debug: Check if the session exists
if (!isset($_SESSION['order_receipt'])) {
    die("Session lost. Please place an order again."); // Debugging message
}

$receipt = $_SESSION['order_receipt'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            color: #34495e;
            line-height: 1.8;
            margin: 10px 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        li {
            background: #ffffff;
            margin: 10px 0;
            padding: 15px;
            border: 1px solid #dcdde1;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #2980b9;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            width: 100%;
            text-align: left;
        }

        h3 {
            color: #2c3e50;
            margin-top: 30px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order, <strong><?php echo htmlspecialchars($receipt['name']); ?></strong>!</p>
    <p><strong>Order ID:</strong> <?php echo $receipt['order_id']; ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($receipt['email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($receipt['phone']); ?></p>
    <p><strong>Shipping Address:</strong></p>
    <p><?php echo nl2br(htmlspecialchars($receipt['address'])); ?></p>

    <h3>Order Summary</h3>
    <ul>
        <?php foreach ($receipt['items'] as $item): ?>
            <li>
                <?php echo htmlspecialchars($item['name']) . " x " . $item['quantity'] . " - € " . number_format($item['price'] * $item['quantity'], 2); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Total: €<?php echo number_format($receipt['grandTotal'], 2); ?></h3>
    <a href="index.html">Return to Home</a>
</body>
</html>
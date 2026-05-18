<?php
session_start();
include 'db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $result = $conn->query("SELECT * FROM products WHERE id = $product_id");
    $product = $result->fetch_assoc();

    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = ['quantity' => 1, 'name' => $product['name'], 'price' => $product['price']];
    } else {
        $_SESSION['cart'][$product_id]['quantity']++;
    }
}

if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $id => $quantity) {
        if ($quantity == 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    }
}

$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td input[type="number"] {
            width: 60px;
            padding: 5px;
        }

        .total-row td {
            font-weight: bold;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        button, a {
            padding: 10px 20px;
            margin: 5px;
            background-color: #4CAF50;
            border: none;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }

        button:hover, a:hover {
            background-color: #45a049;
        }

        .empty-cart {
            text-align: center;
            font-size: 18px;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Your Shopping Cart</h1>

    <?php if (empty($cart)): ?>
        <p class="empty-cart">Your cart is empty. <a href="index.php">Continue Shopping</a></p>
    <?php else: ?>
        <form action="cart.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Name</th> 
                        <th>Price</th> 
                        <th>Quantity</th> 
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $grandTotal = 0; ?>
                    <?php foreach ($cart as $id => $item): ?>
                        <?php
                            $itemName = htmlspecialchars($item['name']);
                            $itemPrice = number_format($item['price'], 2);
                            $quantity = (int)$item['quantity'];
                            $total = $item['price'] * $quantity;
                            $grandTotal += $total;
                        ?>
                        <tr>
                            <td><?= $itemName ?></td>
                            <td>€<?= $itemPrice ?></td>
                            <td>
                                <input type="number" name="quantities[<?= $id ?>]" value="<?= $quantity ?>" min="0">
                            </td>
                            <td>€<?= number_format($total, 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="total-row">
                        <td colspan="3">Grand Total:</td>
                        <td>€<?= number_format($grandTotal, 2) ?></td>
                    </tr>
                </tfoot>
            </table>

            <div class="btn-container">
                <button type="submit" name="update_cart">Update Cart</button>
                <a href="index.php">Continue Shopping</a>
                <a href="checkout.php">Check Out</a>
            </div>
        </form>
    <?php endif; ?>
</body>
</html>

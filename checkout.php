<?php
session_start(); 
include 'db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

$cart = $_SESSION['cart'];
$grandTotal = array_sum(array_map(function ($item) {
    return $item['price'] * $item['quantity'];
}, $cart));

if (isset($_POST['place_order'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $conn->query("INSERT INTO orders (name, email, address, phone, total) VALUES ('$name', '$email', '$address', '$phone', '$grandTotal')");
    $order_id = $conn->insert_id;

    foreach ($cart as $id => $item) {
        $product_name = $item['name'];
        $price = $item['price'];
        $quantity = $item ['quantity'];
        $conn->query ("INSERT INTO order_items (order_id, product_id, product_name, price, quantity) VALUES ('$order_id', '$id', '$product_name', '$price', '$quantity')" );
    }


    unset($_SESSION['cart']);
    if (isset($_POST['place_order'])) {
    $_SESSION['order_receipt'] = [
        'order_id' => $order_id,
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'items' => $cart,
        'grandTotal' => $grandTotal
        ];
}

header ('Location: confirmation.php?order_id='.$order_id);
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <title>Checkout</title>
    <style>
    /* General styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #444;
        margin-top: 20px;
    }

    form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"], input[type="email"], textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
    }

    button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #5cb85c;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #4cae4c;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
        font-size: 14px;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <h1 >Checkout</h1>
    <form action="checkout.php" method="post">
        <label for="name">Full Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="address">Address:</label>
        <textarea name="address" required></textarea>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <h3>Order Summary</h3>
        <ul>
            <?php foreach ($cart as $item): ?>
                <li><?php echo $item['name'] ." x " .$item['quantity']. " = €" .number_format($item['price'] * $item['quantity'], 2); ?></li>
            <?php endforeach; ?>
        </ul>
        <h3>Grand Total: €<?php echo number_format($grandTotal, 2); ?></h3>
        <button type="submit" name="place_order">Place Order</button>
    </form>
    <a href="cart.php">Back to Cart</a>
    
</body>

</html>
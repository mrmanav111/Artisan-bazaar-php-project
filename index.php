<?php
include 'db.php';
$result=$conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .product {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .product div {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            padding: 15px;
        }

        .product img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .product h2 {
            font-size: 1.5em;
            color: #333;
            margin: 10px 0;
        }

        .product p {
            font-size: 1.2em;
            color: #666;
        }

        .product button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .product button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <div class="product">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div>
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h2><?php echo $row['name']; ?></h2>
                <p>&euro;<?php echo number_format($row['price'], 2); ?></p>
                <form action="cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="add_to_cart">Add to cart</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>


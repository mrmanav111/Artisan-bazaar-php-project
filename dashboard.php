<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
header("Location: login.php");
exit();

}

// Add a user
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Use password_hash in production
    $conn->query("INSERT INTO users (username, password) VALUES (‘$username','$password')");
    $message = "User added successfully!";
}

// Add a product

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = 'images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    } else {
        $image =""; 
     }

$conn->query("INSERT INTO products (name, price, image, description, stock) VALUES ('$name', '$price', '$image', '$description', '$stock')");
$message = "Product added successfully!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        form {
            background: #fff;
            margin: 20px 0;
            padding: 15px;
            border-radius: Spx;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form input, form textarea, form button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
        form button {
            background: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }
        form button:hover {
        background; #218838;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            color: #155724;

            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <a href="logout.php" style="color: #fff;">Logout</a>
    </header>

    <div class="container">
        <?php if (isset($message)) echo "<div class='message'>$message</div>"; ?>

        <!-- Add User Form -->

        <form method="post">
            <h2>Add User</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="add_user">Add User</button>
        </form>

        <!-- Add Product Form -->
        <form method="post" enctype="multipart/form-data">

            <h2>Add Product</h2>
            <input type="text" name="name" placeholder="Product Name" required>

            <input type="number" name="price" placeholder="Price" step="0.01" required>
            <textarea name="description" placeholder="Description" rows="4" required></textarea>
            <input type="number" name="stock" placeholder="Stock Quantity" required>

            <input type="file" name="image" accept="image/*">

            <button type="submit" name="add_product">Add Product</button>

        </form>
    </div>

</body>
</html>
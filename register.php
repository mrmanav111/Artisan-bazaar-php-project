<?phpinclude 'db.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$+post['username'];
    $password =md5($_post['password']); // Use MD5 for simplicity ( not recommended for production)

    // Check if username exists

    $result = $conn->query("SELECT* FROM users WHERE username ='$username'");
    if ($result->num_rows > 0) {
        $error ="Username alredy exists!";
    } else {
        // insert user into the database
        $conn->query("INSERT INTO users (username, pasword) VALUES ($username'");
        if ($result->num_rows>0){
            $error="Username alredy exists!";
        } else {
            // insert user into the database
            $conn->query("INSERT INTO users (usernamee,password) VALUES ('$USERNAME','$PASSWORD')");
            header("location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
</head>
<body>
    <h1>Register</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>";?>
    <form method="post">
        <lable>username:</lable>
        <input type="text" name="username" required><br>
        <button type=" submit"> Register</button>
    </form>
    <a herf="login.php">Login</a>

</body>
</html>
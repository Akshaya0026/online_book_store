<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hardcoded admin credentials for restoration
    if ($email == "admin@example.com" && $password == "admin123") {
        $_SESSION['admin'] = $email;
        header("Location: admin_panel.php");
        exit();
    } else {
        $error = "Invalid admin credentials";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login - Online Book Store</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2rem;
            max-width: 400px;
            margin: 2rem auto;
        }

        input {
            display: block;
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        button {
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Admin Login</h2>
    <?php if (isset($error))
        echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" value="admin@example.com" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p><a href="index.php">Back to Home</a></p>
</body>

</html>
<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // In a real app, use prepared statements and password hashing!
    // This is a basic restoration.
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $email;
        echo "Login successful! <a href='index.php'>Go to Home</a>";
    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login - Online Book Store</title>
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
    <h2>User Login</h2>
    <?php if (isset($error))
        echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p><a href="index.php">Back to Home</a></p>
</body>

</html>
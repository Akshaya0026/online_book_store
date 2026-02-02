<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    // Basic preparation to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO books (title, author, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $title, $author, $price);

    if ($stmt->execute()) {
        $message = "Book added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Book - Online Book Store</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2rem;
            max-width: 500px;
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

        .msg {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Add New Book</h2>
    <?php if (isset($message))
        echo "<p class='msg'>$message</p>"; ?>
    <form method="POST">
        <label>Book Title:</label>
        <input type="text" name="title" required>
        <label>Author:</label>
        <input type="text" name="author" required>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" required>
        <button type="submit">Add Book</button>
    </form>
    <p><a href="admin_panel.php">Back to Dashboard</a></p>
</body>

</html>
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<!-- DEBUG: Script Started -->\n";
flush();

if (!file_exists('db.php')) {
die("Error: db.php not found!");
}

echo "<!-- DEBUG: Including db.php -->\n";
include 'db.php';
echo "<!-- DEBUG: db.php included -->\n";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Store</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2rem;
        }

        h1 {
            color: #333;
        }

        .book {
            border: 1px solid #ddd;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }

        .book h3 {
            margin-top: 0;
        }

        .price {
            color: green;
            font-weight: bold;
        }

        nav {
            margin-bottom: 2rem;
        }

        nav a {
            margin-right: 1rem;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>

<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="admin_login.php">Admin Panel</a>
    </nav>

    <h1>Welcome to our Book Store</h1>

    <div class="book-list">
        <?php
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="book">';
                echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
                echo '<p>Author: ' . htmlspecialchars($row["author"]) . '</p>';
                echo '<p class="price">$' . htmlspecialchars($row["price"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No books available yet.</p>";
        }
        ?>
    </div>
</body>

</html>
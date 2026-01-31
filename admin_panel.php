<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Online Book Store</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .btn {
            padding: 0.5rem 1rem;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .red {
            background: red;
        }
    </style>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome,
        <?php echo $_SESSION['admin']; ?> | <a href="index.php">View Site</a> | <a href="logout.php">Logout</a>
    </p>

    <a href="add_book.php" class="btn">Add New Book</a>

    <h3>Current Books</h3>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
        </tr>
        <?php
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                echo "<td>$" . htmlspecialchars($row['price']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No books found</td></tr>";
        }
        ?>
    </table>
</body>

</html>
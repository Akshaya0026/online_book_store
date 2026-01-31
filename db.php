<?php
// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_NAME");

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {
    // Should render a visible error
    die("<h1>Database Connection Failed</h1><p>Error: " . $e->getMessage() . "</p><p>Check your Render Environment Variables (DB_HOST, DB_USER, etc.)</p>");
}
?>
<?php
// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
echo "<!-- DEBUG: Inside db.php -->\n";

$servername = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_NAME");

// Check if ENV variables are set
if (!$servername || !$username || !$dbname) {
    die("<div style='color: red; font-family: sans-serif; padding: 2rem; border: 2px solid red;'>
            <h1>Configuration Error</h1>
            <p><strong>Environment Variables are missing!</strong></p>
            <p>Please go to Render Dashboard -> Environment and set:</p>
            <ul>
                <li>DB_HOST</li>
                <li>DB_USER</li>
                <li>DB_PASSWORD</li>
                <li>DB_NAME</li>
            </ul>
         </div>");
}

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {
    die("<div style='color: red; font-family: sans-serif; padding: 2rem; border: 2px solid red;'>
            <h1>Database Connection Failed</h1>
            <p><strong>Error:</strong> " . $e->getMessage() . "</p>
            <p>Check your Render Environment Variables carefully.</p>
         </div>");
}
?>
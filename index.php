<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Render PHP is working!</h1>";
echo "<p>If you see this, PHP is fine, and the issue is likely the Database connection.</p>";
phpinfo();
?>
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "2211500935";

$maxTries = 10;
$try = 0;
$conn = null;

while ($try < $maxTries) {
    $conn = @new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_errno) {
        echo "Connection attempt $try failed: " . $conn->connect_error . "<br>";
        $try++;
        sleep(2); // Tunggu 2 detik sebelum mencoba lagi
    } else {
        break;
    }
}

if ($conn->connect_errno) {
    die("Connection failed after $maxTries attempts: " . $conn->connect_error);
}
?>

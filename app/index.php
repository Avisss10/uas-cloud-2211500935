<?php
require 'dbconn.php';

if (isset($_POST['contact'])) {
    $contact = $_POST['contact'];
    $conn->query("INSERT INTO tasks (contact) VALUES ('$contact')");
}

$contact = $conn->query("SELECT * FROM contact");
?>

<!DOCTYPE html>
<html>
<head><title>PHP Contact App</title></head>
<body>
<h1>Contact List</h1>
<form method="POST">
    <input type="text" name="contact" placeholder="Enter contact" required>
    <button type="submit">Add Contact</button>
</form>
<ul>
    <?php while ($row = $contact->fetch_assoc()) { ?>
        <li><?php echo htmlspecialchars($row['$contact']); ?></li>
    <?php } ?>
</ul>
</body>
</html>
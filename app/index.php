<?php
require 'dbconn.php';

// Proses form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (nim, nama, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nim, $nama, $email);
    $stmt->execute();
}

// Ambil data
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Input App</title>
</head>
<body>
<h1>Form Input Kontak</h1>
<form method="POST">
    <input type="text" name="nim" placeholder="NIM" required><br>
    <input type="text" name="nama" placeholder="Nama" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <button type="submit">Simpan</button>
</form>

<h2>Data Tersimpan:</h2>
<ul>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <li>
            <?php echo htmlspecialchars($row['nim']) . ' - ' .
                         htmlspecialchars($row['nama']) . ' - ' .
                         htmlspecialchars($row['email']); ?>
        </li>
    <?php } ?>
</ul>
</body>
</html>

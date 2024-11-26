<?php
include('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $cabor = $_POST['cabor'];
    $tel = $_POST['tel'];
    $status = $_POST['status'];
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO pendaftar (nama, cabor, tel, status, pesan) VALUES ('$nama', '$cabor', '$tel', '$status', '$pesan')";
    if ($conn->query($query) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pendaftar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data Pendaftar Catur</h1>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br>
            <label>Cabang Olahraga:</label><br>
            <input type="text" name="cabor" required><br>
            <label>Telepon:</label><br>
            <input type="text" name="tel" required><br>
            <label>Status:</label><br>
            <input type="text" name="status" required><br>
            <label>Pesan:</label><br>
            <textarea name="pesan" required></textarea><br>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
<?php
include('config.php');
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM pendaftar WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $cabor = $_POST['cabor'];
    $tel = $_POST['tel'];
    $status = $_POST['status'];
    $pesan = $_POST['pesan'];

    $query = "UPDATE pendaftar SET nama='$nama', cabor='$cabor', tel='$tel', status='$status', pesan='$pesan' WHERE id=$id";
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
    <title>Edit Data Pendaftar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Data Pendaftar Catur</h1>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
            <label>Cabang Olahraga:</label><br>
            <input type="text" name="cabor" value="<?= $data['cabor']; ?>" required><br>
            <label>Telepon:</label><br>
            <input type="text" name="tel" value="<?= $data['tel']; ?>" required><br>
            <label>Status:</label><br>
            <input type="text" name="status" value="<?= $data['status']; ?>" required><br>
            <label>Pesan:</label><br>
            <textarea name="pesan" required><?= $data['pesan']; ?></textarea><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
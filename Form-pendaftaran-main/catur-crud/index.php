<?php
include('config.php');
$result = $conn->query("SELECT * FROM pendaftar");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar Catur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Pendaftar Catur</h1>
        <a href="create.php" class="btn">Tambah Data</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Cabang Olahraga</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['cabor']; ?></td>
                    <td><?= $row['tel']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['pesan']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
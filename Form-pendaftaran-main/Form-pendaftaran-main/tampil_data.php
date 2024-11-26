<?php
// Koneksi ke database
$host = "localhost";
$user = "root"; // Ganti jika username database Anda berbeda
$password = ""; // Ganti jika ada password
$dbname = "pendaftaran";

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT * FROM pendaftar";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Data Pendaftar Lomba</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Team</th>
                <th>Cabang Olahraga</th>
                <th>No Telepon</th>
                <th>Status</th>
                <th>Anggota Tim</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['cabor']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . nl2br(htmlspecialchars($row['pesan'])) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
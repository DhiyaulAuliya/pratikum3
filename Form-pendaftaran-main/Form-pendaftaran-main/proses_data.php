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

// Ambil data dari form
$nama = $_POST['nama'];
$cabor = $_POST['cabor'];
$tel = $_POST['tel'];
$status = $_POST['Status'];
$pesan = $_POST['pesan'];

// Masukkan data ke tabel
$sql = "INSERT INTO pendaftar (nama, cabor, tel, status, pesan) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nama, $cabor, $tel, $status, $pesan);

if ($stmt->execute()) {
    // Redirect ke landing page
    echo "<script>
        alert('Data berhasil disimpan!');
        window.location.href = 'index.html';
    </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
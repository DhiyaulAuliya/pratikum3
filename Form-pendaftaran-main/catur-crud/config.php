<?php
$servername = "localhost";
$username = "root"; // sesuaikan dengan username database Anda
$password = ""; // sesuaikan dengan password database Anda
$dbname = "pendaftaran"; // sesuaikan dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
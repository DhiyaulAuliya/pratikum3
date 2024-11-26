<?php
include('config.php');
$id = $_GET['id'];

if ($conn->query("DELETE FROM pendaftar WHERE id=$id") === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
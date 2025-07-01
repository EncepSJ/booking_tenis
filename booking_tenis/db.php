<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "booking_tenis"; // sesuai dengan nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

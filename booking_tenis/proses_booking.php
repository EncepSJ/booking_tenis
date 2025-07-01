<?php
include 'sesi.php';
include 'db.php';

// Ambil data dari form
$nama     = $_POST['nama_pemesan'];
$lapangan = $_POST['id_lapangan'];
$tanggal  = $_POST['tanggal_booking'];
$jumlah   = $_POST['jumlah_bola'];

// Ambil harga per bola dari lapangan
$query  = mysqli_query($conn, "SELECT harga_per_bola FROM lapangan WHERE id_lapangan = $lapangan");
$harga  = mysqli_fetch_assoc($query)['harga_per_bola'];
$total  = $harga * $jumlah;

// Simpan ke tabel booking
mysqli_query($conn, "INSERT INTO booking (nama_pemesan, id_lapangan, tanggal_booking, jumlah_bola, total_harga)
                     VALUES ('$nama', '$lapangan', '$tanggal', '$jumlah', '$total')");

// Redirect ke halaman daftar booking
header("Location: booking/list.php");
exit;
?>

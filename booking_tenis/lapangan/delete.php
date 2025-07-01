<?php
include '../sesi.php';
include '../db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM lapangan WHERE id_lapangan = $id");

header("Location: list.php");
exit;
?>

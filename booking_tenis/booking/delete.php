<?php
include '../sesi.php';
include '../db.php';

$id = $_GET['id'];

if (isset($id)) {
    mysqli_query($conn, "DELETE FROM booking WHERE id_booking = $id");
}

header("Location: list.php");
exit;
?>

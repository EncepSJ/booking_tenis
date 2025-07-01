<?php
include '../sesi.php';
include '../db.php';

$id = $_GET['id'];
$booking = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM booking WHERE id_booking = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama_pemesan'];
    $lapangan = $_POST['id_lapangan'];
    $jumlah   = $_POST['jumlah_bola'];
    $tanggal  = $_POST['tanggal_booking'];
    $status   = $_POST['status'];

    $harga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga_per_bola FROM lapangan WHERE id_lapangan = $lapangan"))['harga_per_bola'];
    $total = $harga * $jumlah;

    mysqli_query($conn, "UPDATE booking SET 
        nama_pemesan='$nama', 
        id_lapangan=$lapangan, 
        tanggal_booking='$tanggal', 
        jumlah_bola=$jumlah, 
        total_harga=$total, 
        status='$status' 
        WHERE id_booking=$id");

    header("Location: list.php?update=success");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 600px;
            margin: auto;
            margin-top: 60px;
            padding: 25px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h3 class="text-primary mb-4 text-center">Edit Booking</h3>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" class="form-control" value="<?= $booking['nama_pemesan'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Lapangan</label>
                    <select name="id_lapangan" class="form-select" required>
                        <?php
                        $lapangan = mysqli_query($conn, "SELECT * FROM lapangan");
                        while ($l = mysqli_fetch_assoc($lapangan)) {
                            $selected = ($l['id_lapangan'] == $booking['id_lapangan']) ? 'selected' : '';
                            echo "<option value='{$l['id_lapangan']}' $selected>{$l['nama_lapangan']} - {$l['kelas']} (Rp" . number_format($l['harga_per_bola'], 0, ',', '.') . ")</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Bola</label>
                    <input type="number" name="jumlah_bola" class="form-control" value="<?= $booking['jumlah_bola'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Booking</label>
                    <input type="date" name="tanggal_booking" class="form-control" value="<?= $booking['tanggal_booking'] ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="approved" <?= $booking['status'] == 'approved' ? 'selected' : '' ?>>Approved</option>
                        <option value="canceled" <?= $booking['status'] == 'canceled' ? 'selected' : '' ?>>Canceled</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update Booking</button>
                    <a href="list.php" class="btn btn-secondary">Kembali ke Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

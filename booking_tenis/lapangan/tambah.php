<?php
include '../sesi.php';
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama  = $_POST['nama_lapangan'];
    $kelas = $_POST['kelas'];
    $harga = $_POST['harga_per_bola'];

    mysqli_query($conn, "INSERT INTO lapangan (nama_lapangan, kelas, harga_per_bola)
                         VALUES ('$nama', '$kelas', '$harga')");
    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lapangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h3 class="text-center text-success mb-4">Tambah Lapangan</h3>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Lapangan</label>
                    <input type="text" name="nama_lapangan" class="form-control" required placeholder="Contoh: Lapangan A">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" required placeholder="Contoh: Reguler, VIP, dsb.">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga per Bola</label>
                    <input type="number" name="harga_per_bola" class="form-control" required placeholder="Contoh: 5000">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="list.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

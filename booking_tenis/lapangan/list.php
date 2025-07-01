<?php
include '../sesi.php';
include '../db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Lapangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Daftar Lapangan</h2>
            <a href="../dashboard.php" class="btn btn-outline-secondary">Kembali</a>
        </div>

        <div class="table-container">
            <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Lapangan</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Lapangan</th>
                            <th>Kelas</th>
                            <th>Harga per Bola</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($conn, "SELECT * FROM lapangan");
                        while ($row = mysqli_fetch_assoc($data)) {
                            echo "<tr>
                                    <td>{$row['nama_lapangan']}</td>
                                    <td>{$row['kelas']}</td>
                                    <td>Rp" . number_format($row['harga_per_bola'], 0, ',', '.') . "</td>
                                    <td class='text-center'>
                                        <a href='edit.php?id={$row['id_lapangan']}' class='btn btn-sm btn-warning'>Edit</a>
                                        <a href='delete.php?id={$row['id_lapangan']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Delete</a>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

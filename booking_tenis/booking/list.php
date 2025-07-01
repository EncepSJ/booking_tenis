<?php include '../sesi.php'; include '../db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Booking</title>
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Daftar Booking</h2>
            <a href="../dashboard.php" class="btn btn-secondary">Kembali</a>
        </div>

        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Booking berhasil ditambahkan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <a href="../form_booking.php" class="btn btn-primary mb-3">+ Booking Baru</a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>Nama Pemesan</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jumlah Bola</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT b.*, l.nama_lapangan FROM booking b JOIN lapangan l ON b.id_lapangan = l.id_lapangan ORDER BY b.id_booking DESC");
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>
                                <td>{$row['nama_pemesan']}</td>
                                <td>{$row['nama_lapangan']}</td>
                                <td>{$row['tanggal_booking']}</td>
                                <td class='text-center'>{$row['jumlah_bola']}</td>
                                <td>Rp" . number_format($row['total_harga'], 0, ',', '.') . "</td>
                                <td class='text-center'>{$row['status']}</td>
                                <td class='text-center'>
                                    <a href='edit.php?id={$row['id_booking']}' class='btn btn-sm btn-warning'>Edit</a>
                                    <a href='hapus.php?id={$row['id_booking']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin hapus?\")'>Hapus</a>
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

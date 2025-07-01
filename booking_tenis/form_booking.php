<?php
include 'sesi.php';
include 'db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center mb-4 text-primary">Form Booking Lapangan Tenis Meja</h2>

        <div class="card p-4 bg-white">
            <form action="proses_booking.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" class="form-control" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Lapangan</label>
                    <select name="id_lapangan" class="form-select" required>
                        <option value="">-- Pilih Lapangan --</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM lapangan");
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<option value='{$row['id_lapangan']}'>
                                    {$row['nama_lapangan']} - {$row['kelas']} (Rp" . number_format($row['harga_per_bola'], 0, ',', '.') . " / bola)
                                  </option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Bola</label>
                    <input type="number" name="jumlah_bola" min="1" class="form-control" required placeholder="Minimal 1 bola">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Booking</label>
                    <input type="date" name="tanggal_booking" class="form-control" required>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Booking</button>
                    <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

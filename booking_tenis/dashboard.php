<?php include 'sesi.php'; ?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f5;
        }
        .card {
            transition: all 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold">Dashboard Admin</h2>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">Form Booking</h5>
                        <p class="card-text">Input pemesanan bola</p>
                        <a href="form_booking.php" class="btn btn-primary w-100">Input Booking</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-success h-100">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold">Daftar Booking</h5>
                        <p class="card-text">Lihat semua pemesanan</p>
                        <a href="booking/list.php" class="btn btn-success w-100">Lihat Booking</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-warning h-100">
                    <div class="card-body">
                        <h5 class="card-title text-warning fw-bold">Data Lapangan</h5>
                        <p class="card-text">Kelola nama & harga lapangan</p>
                        <a href="lapangan/list.php" class="btn btn-warning w-100">Kelola Lapangan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opsional jika pakai komponen interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

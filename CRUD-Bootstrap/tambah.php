<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $kelamin = $_POST['kelamin'];

    $query = "INSERT INTO pengguna (nama, umur, kelamin) VALUES ('$nama', '$umur', '$kelamin')";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Berhasil Ditambah!'); window.location='index.php'; </script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm" style="max-width: 500px; margin: auto;">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Tambah Pengguna</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Umur</label>
                    <input type="number" name="umur" class="form-control" placeholder="Masukkan umur" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelamin</label>
                    <select name="kelamin" class="form-select">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button name="tambah" class="btn btn-success w-100">
                        <i class="bi bi-check-circle me-1"></i>Tambah Sekarang
                    </button>
                    <a href="index.php" class="btn btn-secondary w-100">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
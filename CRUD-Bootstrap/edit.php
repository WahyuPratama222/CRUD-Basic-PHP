<?php
include 'koneksi.php';

$id = $_GET['id'];
$query_satu = "SELECT * FROM pengguna WHERE id = '$id'";
$result = mysqli_query($conn, $query_satu);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama_baru'];
    $umur = $_POST['umur_baru'];
    $kelamin = $_POST['kelamin_baru'];

    $query_kedua = "UPDATE pengguna SET nama = '$nama', umur = '$umur', kelamin = '$kelamin' WHERE id = '$id'";

    if (mysqli_query($conn, $query_kedua)) {
        echo "<script> alert('Berhasil Diubah!'); window.location='index.php'; </script>";
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
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm" style="max-width: 500px; margin: auto;">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Pengguna</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_baru" class="form-control"
                           value="<?= $data['nama'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Umur</label>
                    <input type="number" name="umur_baru" class="form-control"
                           value="<?= $data['umur'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelamin</label>
                    <select name="kelamin_baru" class="form-select">
                        <option value="Laki-laki" <?= ($data['kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($data['kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button name="edit" class="btn btn-warning w-100">
                        <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
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
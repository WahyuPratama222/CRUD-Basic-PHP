<?php
include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM pengguna WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-people-fill me-2"></i>Data Pengguna</h5>
            <a href="tambah.php" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle me-1"></i>Tambah Pengguna
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_inside = "SELECT * FROM pengguna";
                    $result = mysqli_query($conn, $query_inside);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['umur'] ?></td>
                        <td>
                            <?php if ($row['kelamin'] == 'Laki-laki'): ?>
                                <span class="badge bg-primary"><i class="bi bi-gender-male me-1"></i><?= $row['kelamin'] ?></span>
                            <?php else: ?>
                                <span class="badge bg-danger"><i class="bi bi-gender-female me-1"></i><?= $row['kelamin'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <a href="index.php?hapus=<?= $row['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
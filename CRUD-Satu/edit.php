<?php

include 'koneksi.php';

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Cari data mahasiswa berdasarkan ID tersebut
$query = "SELECT * FROM mahasiswa WHERE id = '$id'";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// 3. Logika Update (ketika tombol simpan diklik)
if (isset($_POST['update'])){
    $nama = $_POST['nama'];
    $kelamin = $_POST ['kelamin'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $query_sql = "UPDATE mahasiswa SET nama='$nama', kelamin='$kelamin', nim='$nim', jurusan='$jurusan' WHERE id = '$id'";

    if (mysqli_query($conn, $query_sql)) {
        echo "<script>alert('Data diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
</head>
<body>
    <h3>Update Data Mahasiswa</h3>

    <form action="" method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>

    <label>Kelamin:</label><br>
    <select name="kelamin">
        <option value="Laki-laki" <?= ($data['kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
        <option value="Perempuan" <?= ($data['kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
    </select><br><br>

    <label>NIM:</label><br>
    <input type="number" name="nim" value="<?= $data['nim'] ?>"><br><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>"><br><br>

    <button type="submit" name="update">Simpan Perubahan</button>
</form>
</body>
</html>
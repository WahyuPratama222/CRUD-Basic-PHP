<?php

include 'koneksi.php';

if (isset($_POST['tambah'])){
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];

    $query = "INSERT INTO barang (nama_barang, jumlah_barang) VALUES ('$nama_barang', $jumlah_barang)";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Berhasil Ditambah!'); window.location = 'index.php'; </script>";
    }  else {
        echo "Gagal" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<body>
    <form method="POST">
        <label> Nama Barang </label> <br>
        <input type="text" name="nama_barang" required> <br> <br>

        <label> Jumlah Barang </label> <br>
        <input type="number" name="jumlah_barang" required> <br> <br>

        <button name="tambah"> Tambah Barang </button> <br><br>

        <a href="index.php"> Kembali </a>
    </form>
</body>
</html>
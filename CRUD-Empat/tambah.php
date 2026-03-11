<?php

include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $kapasitas = $_POST['kapasitas'];
    $tipe = $_POST['tipe'];

    $query = "INSERT INTO ruangan (nama, kapasitas, tipe) VALUES ('$nama', '$kapasitas', '$tipe')";

    if (mysqli_query($conn, $query)){
        echo "<script> alert('Berhasil Ditambah!'); window.location='index.php' </script>";
    } else {
        echo "Gagal Menambah : " . mysqli_error($conn);
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
    <h3>Tambah Ruangan</h3>
    
    <form method="POST">
        <label> Nama Ruangan: </label> <br> 
        <input type="text " name="nama" required> <br><br>
        
        <label> Kapasitas: </label><br>
        <input type="number " name="kapasitas" required> <br><br>
        
        <label> Tipe Ruangan: </label><br>
        <select name="tipe">
            <option value="Small">Small</option>
            <option value="Big">Big</option>
            <option value="Large">Large</option>
        </select> <br><br>

        <button name="tambah"> Tambah Sekarang </button> <br><br>

        <a href="index.php">Kembali</a>

    </form>
    
</body>
</html>
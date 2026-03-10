<?php

include 'koneksi.php';

// Untuk Filler Isi Sebelumnya
$id = $_GET['id'];
$query_data = "SELECT * FROM barang WHERE id = '$id'";
$result = mysqli_query($conn, $query_data);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['edit'])){
    

    //Method Post Untuk Timpa yang Baru
    $nama_barang = $_POST['nama_barang_baru'];
    $jumlah_barang = $_POST['jumlah_barang_baru'];

    $query_post = "UPDATE barang SET nama_barang='$nama_barang', jumlah_barang='$jumlah_barang' WHERE id='$id'";

    if (mysqli_query($conn, $query_post)) {
        echo "<script> alert('Berhasil di Update!'); window.location = 'index.php' </script>";
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
    <title>Edit</title>
</head>
<body>
    <form method="POST">
        <label> Nama Barang </label> <br>
        <input type="text" name="nama_barang_baru" value="<?= $data['nama_barang']?>" > <br><br>
 
        <label> Jumlah Barang </label> <br>
        <input type="number" name="jumlah_barang_baru" value="<?= $data['jumlah_barang']?>"> <br> <br>

        <button name="edit"> Edit Sekarang </button> <br> <br>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>

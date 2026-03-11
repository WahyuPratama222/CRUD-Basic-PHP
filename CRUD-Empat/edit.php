<?php

include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM ruangan WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['tambah'])){
    $nama = $_POST['nama_baru'];
    $kapasitas = $_POST['kapasitas_baru'];
    $tipe = $_POST['tipe_baru'];

    $query_post = "UPDATE ruangan SET nama = '$nama', kapasitas = '$kapasitas', tipe ='$tipe' WHERE id = '$id'"; 
    
    if(mysqli_query($conn, $query_post)){
        echo "<script> alert('Berhasil Diupdate!'); window.location='index.php' </script>";
    } else {
        echo "Gagal Diupdate: " . mysqli_error($conn); 
    }
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h3>Update Ruangan</h3>
    
    <form method="POST">
        <label> Nama Ruangan: </label> <br> 
        <input type="text " name="nama_baru" value="<?= $data['nama'] ?>" required> <br><br>
        
        <label> Kapasitas: </label><br>
        <input type="number " name="kapasitas_baru" value="<?= $data['kapasitas'] ?>" required> <br><br>
        
        <label> Tipe Ruangan: </label><br>
        <select name="tipe_baru">
            <option value="Small" <?= ($data['tipe'] == 'Small') ? 'selected' : '' ?>>Small</option>
            <option value="Big" <?= ($data['tipe'] == 'Big') ? 'selected' : '' ?>>Big</option>
            <option value="Large" <?= ($data['tipe'] == 'Large') ? 'selected' : '' ?>>Large</option>
        </select> <br><br>

        <button name="tambah"> Update Sekarang </button> <br><br>

        <a href="index.php">Kembali</a>

    </form>
    
</body>
</html>

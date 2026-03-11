<?php

include 'koneksi.php';

if (isset($_POST['tambah'])){
    
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $kelamin = $_POST['kelamin'];

    $query = "INSERT INTO pengguna (nama, umur, kelamin) VALUES ('$nama', '$umur', '$kelamin')";

    if (mysqli_query($conn, $query)){
        echo "<script> alert('Behasil Ditambah!'); window.location='index.php'; </script>";
    } else {
        echo "Gagal " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambaaj</title>
</head>
<body>
    <h3>Form Tambah</h3> <br>
    <hr>

    <form method="POST">
        <label> Nama </label> <br>
        <input type="text" name="nama" required> <br> <br>

        <label> Umur </label> <br>
        <input type="number" name="umur" required> <br> <br>

        <label> Kelamin </label> <br>
        <select name="kelamin">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select> <br><br>

        <button name="tambah"> Tambah Sekarang </button> <br><br>

        <a href="index.php">Kembali!</a> 
    </form>

</body>
</html>
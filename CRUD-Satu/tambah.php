<?php

include 'koneksi.php';

if (isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO mahasiswa (nama, kelamin, nim, jurusan) 
               VALUES ('$nama','$kelamin', '$nim', '$jurusan')";
               
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil ditambah!'); window.location='index.php';</script>";
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
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h3>Tambah Data Mahasiswa</h3>

    <form action="" method="POST">
        <label>Nama: </label> <br>
        <input type="text" name="nama" required> <br><br>
        
        <label>Jenis Kelamin: </label><br>
        <select name="kelamin">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select> <br><br>
        
        <label>NIM: </label> <br>
        <input type="text" name="nim" required> <br><br>

        <label>Jurusan: </label> <br>
        <input type="text" name="jurusan" required> <br><br>

        <button type="submit" name="submit">Simpan Data</button> <br><br>
        <a href="index.php">Kembali</a>

    </form>

</body>
</html>
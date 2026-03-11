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
    
    if (mysqli_query($conn, $query_kedua)){
        echo "<script> alert('Berhasil Diubah!'); window.location='index.php' </script>";
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
    <h3> Edit Dulu Yeah</h3>
    <hr>

    <form method="POST">
        <label> Nama </label> <br>
        <input type="text" name="nama_baru" value="<?= $data['nama'] ?>" required> <br><br>
        
        <label> Umur</label> <br>
        <input type="number" name="umur_baru" value="<?= $data['umur'] ?>" required> <br><br>

        <label> Kelamin </label> <br>
        <select name="kelamin_baru">
            <option value="Laki-laki" <?= ($data['kelamin'] == "Laki-laki") ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($data['kelamin'] == "Perempuan") ? 'selected' : '' ?>>Perempuan</option>
        </select> <br><br>

        <button name="edit">Edit Sekarang!</button> <br><br>

        <a href="index.php">Kembali!</a>

    </form>

</body>
</html>
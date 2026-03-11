<?php

include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM ruangan WHERE id = $id";

    mysqli_query($conn, $query);
    header('Location: index.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>

    <h3>Main Utama</h3>

    <a href="tambah.php"> <b> Tambah Ruangan</b> </a> <br><br>

    <table border="2" cellpadding ="10">
        <tr>
            <th>Id</th>
            <th>Nama Ruangan</th>
            <th>Kapasitas</th>
            <th>Tipe Ruangan</th>
            <th>Aksi</th>
        </tr>
        
        <?php
            $query = "SELECT * FROM ruangan";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kapasitas'] ?></td>
                <td><?= $row['tipe'] ?></td>
                <td>
                    <a href="edit.php?id= <?= $row['id'] ?>">Edit</a>
                    <a href="index.php?id= <?= $row['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
                </td>
            </tr>
        <?php
            }
        ?>


    </table>
    
</body>
</html>
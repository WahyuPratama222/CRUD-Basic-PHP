<?php

include 'koneksi.php';

if (isset($_GET['hapus'])){
    $id = $_GET['id'];

    $query = "DELETE FROM pengguna WHERE id = '$id'";

    mysqli_query($conn, $query);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Main Utama</h3>
    
    <a href="tambah.php"> Tambah Pengguna </a> <br><br>

    <table border="2" cellpadding = "10">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Kelamin</th>
            <th>Aksi</th>
        </tr>
        <?php
            $querry_inside = "SELECT * FROM pengguna";
            $result = mysqli_query($conn, $querry_inside);
            while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td> <?= $row['id'] ?></td>
                <td> <?= $row['nama'] ?></td>
                <td> <?= $row['umur'] ?></td>
                <td> <?= $row['kelamin'] ?></td>
                <td> 
                    <a href="edit.php?id= <?= $row['id'] ?>">Edit</a>
                    <a href="index.php?hapus= <?= $row['id'] ?>" onclick="return confirm ('Yakin?')">Hapus</a>
                </td>
            </tr>
        <?php    
            }
        ?>

    </table>

</body>
</html>

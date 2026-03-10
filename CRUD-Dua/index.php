<?php

include 'koneksi.php';

if (isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    $query = "DELETE FROM barang WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location = index.php");
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
    <a href="tambah.php"> Tambah List Barang </a> <hr>
    
    <table border="2" cellpadding = "5">
        <tr>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Edit</th>
        </tr>

        <?php
            $data_query = "SELECT * FROM barang";
            $data = mysqli_query($conn, $data_query);
            
            while ($row = mysqli_fetch_assoc($data)) {
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah_barang'] ?></td>
                <td>
                    <a href="edit.php?id= <?= $row['id'] ?>"> Edit </a> <br>
                    <a href="index.php?hapus= <?= $row['id'] ?>" onclick = "return confirm('Yakin?')"> Hapus </a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>


</body>
</html>
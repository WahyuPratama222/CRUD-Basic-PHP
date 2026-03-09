<?php

include 'koneksi.php';

if (isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    $query = "DELETE FROM mahasiswa WHERE id = '$id'";

    mysqli_query($conn, $query);
    header("Location = index.php");
};

?>

<a href="tambah.php"> Tambah Siswa</a> <br> <br>

<table border='1' cellpading='10'>
    <tr>
        <th>Nama</th>
        <th>Kelamin</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    <?php
    $data = mysqli_query($conn, "SELECT * FROM mahasiswa");
    while($row = mysqli_fetch_assoc($data)) {
      ?>
      <tr>
        <td><?= $row ["nama"] ?></td>
        <td><?= $row ["kelamin"] ?></td>
        <td><?= $row ["nim"] ?></td>
        <td><?= $row ["jurusan"] ?></td>
        <td>
            <a href="edit.php?id=<?= $row ['id'] ?>">Edit</a> |
            <a href="index.php?hapus=<?= $row ['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
</table>

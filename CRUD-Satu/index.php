<?php

include 'koneksi.php';

if (isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, 'DELETE FROM MAHASISWA WHERE id = $id');
    header("Location = index.php");
};

?>

<a href="tambah.php"> Tambah Siswa</a>

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
            <a href="index.php?hapus=<?= $row ['id'] ?>">" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
</table>

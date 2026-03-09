<?php

$host = 'localhost';
$user = 'root';
$password = 'WWsjIsd982Wahyu';
$db = 'latihanutspemweb';

$conn = mysqli_connect($host, $user, $root, $password);

if (!$conn) {
    die ("Koneksi Gagal: " . mysqli_connect_error());
}

?>
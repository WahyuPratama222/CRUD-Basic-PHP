<?php

$host = 'localhost';
$user = 'root';
$password = 'WWsjIsd982Wahyu';
$database = 'latihanutspemweb';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn){
    die ("Gagal : " . mysqli_connect_error());
}
?>
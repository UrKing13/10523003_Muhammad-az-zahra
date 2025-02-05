<?php

$host = "localhost";
$username = "root";
$password = "";
$nama_db = "nilaionline_10523003";

// Mulai koneksi ke MySQL
$koneksi = mysqli_connect($host, $username, $password, $nama_db);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi MySQL gagal: " . mysqli_connect_error());
} else {
    echo "";
}

?>
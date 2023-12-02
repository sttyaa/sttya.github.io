<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "medayu";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { // cek koneksi
  die ("Koneksi Database Gagal");
}

?>
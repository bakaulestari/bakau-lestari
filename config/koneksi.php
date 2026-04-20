<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bakau_lestari";
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { die("Koneksi gagal: " . mysqli_connect_error()); }
?>
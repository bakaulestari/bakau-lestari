<?php
session_start();
if(!isset($_SESSION["admin"])) { header("Location: index.php"); exit(); }
include "../config/koneksi.php";
$id = mysqli_real_escape_string($conn, $_GET["id"]);
$query = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id = $id");
$data = mysqli_fetch_assoc($query);
if($data) {
    $filePath = "../uploads/" . $data["gambar"];
    if(file_exists($filePath)) { unlink($filePath); }
    mysqli_query($conn, "DELETE FROM galeri WHERE id = $id");
}
header("Location: dashboard.php");
exit();
?>
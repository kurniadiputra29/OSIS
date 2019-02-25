<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];

$sql = "DELETE FROM jabatan WHERE id_jabatan = '$ID'";
mysqli_query($koneksi,$sql);
header('location:index.php');
?>

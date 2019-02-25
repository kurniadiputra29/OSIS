<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];

$sql = "DELETE FROM peralatan WHERE id_peralatan = '$ID'";
mysqli_query($koneksi,$sql);
header('location:index.php');
?>

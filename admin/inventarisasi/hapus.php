<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];

$sql = "DELETE FROM inventarisasi WHERE id_inventaris = '$ID'";
mysqli_query($koneksi,$sql);
header('location:index.php');
?>

<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];

$sql = "DELETE FROM tipe_proker WHERE id_type = '$ID'";
mysqli_query($koneksi,$sql);
header('location:index.php');
?>

<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];

$sql = "DELETE FROM program_kerja WHERE id_proker = '$ID'";
mysqli_query($koneksi,$sql);
header('location:index_proker.php');
?>

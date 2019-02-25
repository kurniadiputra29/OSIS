<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];

$sql = "DELETE FROM role WHERE id_role = '$ID'";
mysqli_query($koneksi,$sql);
header('location:index_role.php');
?>
<?php

include '../../config/koneksi.php';
$ID   = $_GET['id'];
$sql1    = "SELECT * from cek_proker where id_cek=$ID";
$result1 = mysqli_query($koneksi,$sql1);
$row1    = mysqli_fetch_assoc($result1);
$cari = $row1['jabatan'];

$sql = "DELETE FROM cek_proker WHERE id_cek = '$ID'";
mysqli_query($koneksi,$sql);
header("location:http://localhost/osis/admin/pengawasan_proker/index.php?cari=$cari");
?>

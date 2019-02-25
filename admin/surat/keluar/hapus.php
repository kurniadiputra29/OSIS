<?php
include '../../../config/koneksi.php';
$ID   = $_GET['id'];
$sql1    = "SELECT foto FROM surat_keluar where id_keluar=$ID";
$result1 = mysqli_query($koneksi,$sql1);
$row1   = mysqli_fetch_assoc($result1);
echo $img = $row1['foto'];
$gambar = "foto/".$img;

if (!unlink($gambar))
{
	echo ("Error deleting $gambar");
}
else
{
	echo ("Deleted $img SUCCES");
}
$sql = "DELETE FROM surat_keluar WHERE id_keluar = '$ID'";	
mysqli_query($koneksi,$sql);
header('location:index.php');
?>
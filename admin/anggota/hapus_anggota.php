<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];
$sql1    = "SELECT foto FROM anggota where id_anggota=$ID";
$result1 = mysqli_query($koneksi,$sql1);
$row1   = mysqli_fetch_assoc($result1);
echo $img = $row1['foto'];
$foto = "foto_anggota/".$img;

if (!unlink($foto))
{
	echo ("Error deleting $foto");
}
else
{
	echo ("Deleted $img SUCCES");
}
$sql = "DELETE FROM anggota WHERE id_anggota = '$ID'";	
mysqli_query($koneksi,$sql);
header('location:index_anggota.php');
?>
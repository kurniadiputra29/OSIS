<?php
include '../../../config/koneksi.php';
$ID   = $_GET['id'];
$sql1    = "SELECT bukti FROM keuangan_eksternal where id_eksternal=$ID";
$result1 = mysqli_query($koneksi,$sql1);
$row1   = mysqli_fetch_assoc($result1);
echo $img = $row1['bukti'];
$gambar = "nota/".$img;

if (!unlink($gambar))
{
	echo ("Error deleting $gambar");
}
else
{
	echo ("Deleted $img SUCCES");
}
$sql = "DELETE FROM keuangan_eksternal WHERE id_eksternal = '$ID'";	
mysqli_query($koneksi,$sql);
header('location:index.php');
?>
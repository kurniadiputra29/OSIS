<?php
include '../../../config/koneksi.php';
$ID   = $_GET['id'];
$sql1    = "SELECT bukti FROM keuangan_internal where id_internal=$ID";
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
$sql = "DELETE FROM keuangan_internal WHERE id_internal = '$ID'";	
mysqli_query($koneksi,$sql);
header('location:index.php');
?>
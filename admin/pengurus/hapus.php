<?php
include '../../config/koneksi.php';
$ID   = $_GET['id'];
$sql1    = "SELECT foto FROM pengurus where id_pengurus=$ID";
$result1 = mysqli_query($koneksi,$sql1);
$row1   = mysqli_fetch_assoc($result1);
echo $img = $row1['foto'];
$foto = "foto/".$img;

if (!unlink($foto))
{
	echo ("Error deleting $foto");
}
else
{
	echo ("Deleted $img SUCCES");
}
$sql = "DELETE FROM pengurus WHERE id_pengurus = '$ID'";	
mysqli_query($koneksi,$sql);
header('location:index.php');
?>
<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data,
include '../../config/koneksi.php';
$ID   = $_POST['id'];
$nama = $_POST['nama'];
$type = $_POST['type'];

$sql = "UPDATE peralatan SET nama='$nama', type='$type' WHERE id_peralatan='$ID'";
mysqli_query($koneksi,$sql);
header('location:index.php');
}  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>

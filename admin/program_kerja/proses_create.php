<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../config/koneksi.php';
$proker = $_POST['proker'];
$jabatan = $_POST['jabatan'];
$tipe =$_POST['tipe'];

$sql = "INSERT INTO program_kerja (jabatan, proker, id_type) VALUES ('$jabatan', '$proker' , '$tipe')";
mysqli_query($koneksi,$sql);
header('location:index_proker.php');
}  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>
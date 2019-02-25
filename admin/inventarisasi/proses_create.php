<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../config/koneksi.php';
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$date = date('Y-m-d');

$sql = "INSERT INTO inventarisasi (id_peralatan, jumlah, kondisi, pengecekan) VALUES ('$nama', '$jumlah', '$kondisi', '$date')";
mysqli_query($koneksi,$sql);
header('location:index.php');
}  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>
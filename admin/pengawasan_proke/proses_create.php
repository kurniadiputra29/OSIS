<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../config/koneksi.php';
$proker = $_POST['proker'];
$penjelasan = $_POST['penjelasan'];
$status =$_POST['status'];
$cari = $_POST['cari'];

$sql = "INSERT INTO cek_proker (id_proker, jabatan, keterangan, alasan) VALUES ('$proker', '$cari', '$status' , '$penjelasan')";
mysqli_query($koneksi,$sql);
header("location:http://localhost/osis/admin/pengawasan_proker/index.php?cari=$cari");

}  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>
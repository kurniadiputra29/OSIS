<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../../config/koneksi.php';
echo $keperluan = $_POST['keperluan'];
echo "<br>";
echo $masuk = $_POST['masuk'];
echo $deadline = $_POST['deadline'];
echo $dari = $_POST['dari'];
echo "<br>";
echo $nama_foto = $_FILES['foto']['name'];
echo $tmp_name = $_FILES['foto']['tmp_name'];
echo "<br>";
$nama_baru = round(microtime(true)). '.jpg' . end($nama_foto);//fungsi untuk membuat nama acak
move_uploaded_file($tmp_name, "foto/". $nama_baru);

$sql = "INSERT INTO surat_masuk (keperluan, masuk, deadline, dari, foto) VALUES ('$keperluan', '$masuk', '$deadline', '$dari', '$nama_baru')";
mysqli_query($koneksi,$sql);
header('location:index.php');

}  else{
    echo "Anda Belum Login, silahkan <a href='../../../index.php'>login</a>";
    }
?>

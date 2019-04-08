<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../config/koneksi.php';
echo $name = $_POST['nama'];
echo $kelas = $_POST['kelas'];
echo $hp = $_POST['hp'];
echo $alamat = $_POST['alamat'];
echo $jabatan = $_POST['jabatan'];
echo $nama_gambar = $_FILES['foto']['name'];
echo $tmp_name = $_FILES['foto']['tmp_name'];

$nama_baru = round(microtime(true)). '.jpg' . end($nama_gambar);//fungsi untuk membuat nama acak
move_uploaded_file($tmp_name, "foto/". $nama_baru);

//move_uploaded_file($tmp_name, "../../gambar/".$nama_gambar);
$sql = "INSERT INTO pengurus (nama, kelas, hp, alamat, jabatan, foto) VALUES ('$name', '$kelas', '$hp', '$alamat', '$jabatan', '$nama_baru')";
mysqli_query($koneksi,$sql);
header('location:index.php');
}  else{
    echo "Anda Belum Login, silahkan <a href='../index.php'>login</a>";
    }
?>

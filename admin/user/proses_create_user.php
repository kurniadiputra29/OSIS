<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../config/koneksi.php';
echo $name = $_POST['nama'];
echo $email = $_POST['email'];
echo $password = md5 ($_POST['password']);
echo $role_id = $_POST['role_id'];
echo $nama_gambar = $_FILES['foto']['name'];
echo $tmp_name = $_FILES['foto']['tmp_name'];

$nama_baru = round(microtime(true)). '.jpg' . end($nama_gambar);//fungsi untuk membuat nama acak
move_uploaded_file($tmp_name, "../foto_user/". $nama_baru);

//move_uploaded_file($tmp_name, "../../gambar/".$nama_gambar);
$sql = "INSERT INTO user (nama, email, password, foto, role_id) VALUES ('$name', '$email', '$password', '$nama_baru', '$role_id')";
mysqli_query($koneksi,$sql);
header('location:index_user.php');
}  else{
    echo "Anda Belum Login, silahkan <a href='../index.php'>login</a>";
    }
?>

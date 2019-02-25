<?php 
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data,

	include '../../config/koneksi.php';
	$ID   = $_POST['id'];
	echo $nama = $_POST['nama'];
	    $sql = "UPDATE role SET 
	    					nama       = '$nama'
	                    WHERE id_role='$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index_role.php');
}  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>
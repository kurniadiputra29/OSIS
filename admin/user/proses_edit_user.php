<?php 
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data,

	include '../../config/koneksi.php';
	$ID   = $_POST['id'];
	echo $name        = $_POST['nama'];
	echo $email       = $_POST['email'];
	echo $password    = md5 ($_POST['password']);
	echo $role_id = $_POST['role_id'];
	echo $nama_gambar = $_FILES['foto']['name'];
	echo $tmp_name    = $_FILES['foto']['tmp_name'];

	// Apabila gambar tidak diganti
	if (empty($nama_gambar)){
	    $sql = "UPDATE user SET 
	    					nama    = '$name',
	    					email    = '$email',
	    					id_role = '$role_id'
	                    WHERE id_user='$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index_user.php');
	}else{

		$sql1    = "SELECT foto FROM user where id=$ID";
		$result1 = mysqli_query($koneksi,$sql1);
		$row1   = mysqli_fetch_assoc($result1);
		echo $img = $row1['foto'];
		$gambar = "../foto_user/".$img;

		if (!unlink($gambar)) {
			echo ("Error deleting $gambar");
		} else {
			echo ("Deleted $img SUCCES");
		}
		$nama_baru = round(microtime(true)). '.jpg' . end($nama_gambar);//fungsi untuk membuat nama acak
		move_uploaded_file($tmp_name, "../foto_user/". $nama_baru);
	    //move_uploaded_file($_FILES['gambar']['tmp_name'],'images/'.$nama_gambar);
	    $sql = "UPDATE user SET 
	    					nama    = '$name',
	    					email    = '$email',
	    					foto    = '$nama_baru',
	    					id_role = '$role_id'
	                    WHERE id_user='$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index_user.php');
	}
}  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>
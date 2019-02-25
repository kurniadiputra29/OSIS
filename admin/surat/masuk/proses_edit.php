<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../../config/koneksi.php';
$ID   = $_POST['id'];
echo $keperluan = $_POST['keperluan'];
echo "<br>";
echo $masuk = $_POST['masuk'];
echo $deadline = $_POST['deadline'];
echo $dari = $_POST['dari'];
echo "<br>";
echo $nama_foto = $_FILES['foto']['name'];
echo $tmp_name = $_FILES['foto']['tmp_name'];
echo "<br>";



echo "<br>";
	// Apabila gambar tidak diganti
	if (empty($nama_foto)){
	    $sql = "UPDATE surat_masuk SET 
	    					keperluan     	= '$keperluan',
	    					masuk      = '$masuk',
	    					deadline     	= '$deadline',
	    					dari      = '$dari'
	                    WHERE id_masuk	= '$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index.php');
	}else{

		$sql1    = "SELECT foto FROM surat_masuk where id_masuk=$ID";
		$result1 = mysqli_query($koneksi,$sql1);
		$row1   = mysqli_fetch_assoc($result1);
		echo $img = $row1['foto'];
		$gambar = "foto/".$img;

		if (!unlink($gambar)) {
			echo ("Error deleting $gambar");
		} else {
			echo ("Deleted $img SUCCES");
		}

		$nama_baru = round(microtime(true)). '.jpg' . end($nama_foto);//fungsi untuk membuat nama acak
		move_uploaded_file($tmp_name, "foto/". $nama_baru);
	    //move_uploaded_file($_FILES['gambar']['tmp_name'],'images/'.$nama_gambar);
		$sql2 = "UPDATE surat_masuk SET 
	    					keperluan     	= '$keperluan',
	    					masuk      = '$masuk',
	    					deadline     	= '$deadline',
	    					dari      = '$dari',
	    					foto			= '$nama_baru'
	                    WHERE id_masuk	= '$ID'";
	    mysqli_query($koneksi,$sql2);
	 	header('location:index.php');
	}

}  else{
    echo "Anda Belum Login, silahkan <a href='../../../index.php'>login</a>";
    }
?>

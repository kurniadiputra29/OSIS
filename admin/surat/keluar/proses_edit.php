<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../../config/koneksi.php';
$ID   = $_POST['id'];
echo $keperluan = $_POST['keperluan'];
echo "<br>";
echo $keluar = $_POST['keluar'];
echo $deadline = $_POST['deadline'];
echo $kepada = $_POST['kepada'];
echo "<br>";
echo $nama_foto = $_FILES['foto']['name'];
echo $tmp_name = $_FILES['foto']['tmp_name'];

	// Apabila gambar tidak diganti
	if (empty($nama_foto)){
	    $sql = "UPDATE surat_keluar SET 
	    					keperluan     = '$keperluan',
	    					keluar      = '$keluar',
	    					deadline     = '$deadline',
	    					kepada      = '$kepada'
	                    WHERE id_keluar='$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index.php');
	}else{

		$sql1    = "SELECT foto FROM surat_keluar where id_keluar=$ID";
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
		$sql = "UPDATE surat_keluar SET 
	    					keperluan     = '$keperluan',
	    					keluar      = '$keluar',
	    					deadline     = '$deadline',
	    					kepada      = '$kepada',
	    					foto		= '$nama_baru'
	                    WHERE id_keluar='$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index.php');
	}

}  else{
    echo "Anda Belum Login, silahkan <a href='../../../index.php'>login</a>";
    }
?>

<?php 
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data,

	include '../../config/koneksi.php';
	$ID   = $_POST['id'];
	echo $name = $_POST['nama'];
	echo $kelas = $_POST['kelas'];
	echo $hp = $_POST['hp'];
	echo $alamat = $_POST['alamat'];
	echo $jabatan = $_POST['jabatan'];
	echo $nama_gambar = $_FILES['foto']['name'];
	echo $tmp_name = $_FILES['foto']['tmp_name'];

	// Apabila gambar tidak diganti
	if (empty($nama_gambar)){
	    $sql = "UPDATE anggota SET 
	    					nama    = '$name',
	    					kelas   = '$kelas',
	    					hp 		= '$hp'
	    					alamat    = '$alamat',
	    					jabatan   = '$jabatan',
	                    WHERE id_anggota ='$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index_anggota.php');
	}else{

		$sql1    = "SELECT foto FROM anggota where id_anggota=$ID";
		$result1 = mysqli_query($koneksi,$sql1);
		$row1   = mysqli_fetch_assoc($result1);
		echo $img = $row1['foto'];
		$gambar = "foto_anggota/".$img;

		if (!unlink($gambar)) {
			echo ("Error deleting $gambar");
		} else {
			echo ("Deleted $img SUCCES");
		}
		$nama_baru = round(microtime(true)). '.jpg' . end($nama_gambar);//fungsi untuk membuat nama acak
		move_uploaded_file($tmp_name, "foto_anggota/". $nama_baru);
	    //move_uploaded_file($_FILES['gambar']['tmp_name'],'images/'.$nama_gambar);
	    $sql = "UPDATE anggota SET 
	    					nama    = '$name',
	    					kelas   = '$kelas',
	    					hp 		= '$hp',
	    					alamat    = '$alamat',
	    					jabatan   = '$jabatan',
	    					foto    = '$nama_baru'
	                    WHERE id_anggota='$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index_anggota.php');
	}
}  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>
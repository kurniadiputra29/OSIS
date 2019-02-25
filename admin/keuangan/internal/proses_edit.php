<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../../config/koneksi.php';
$ID   = $_POST['id'];
echo $pemasukan = $_POST['pemasukan'];
echo "<br>";
echo $pengeluaran = $_POST['pengeluaran'];
echo $saldo = $_POST['saldo'];
echo $tanggal = $_POST['tanggal'];
echo $keterangan = $_POST['keterangan'];
echo "<br>";
echo $nama_nota = $_FILES['nota']['name'];
echo $tmp_name = $_FILES['nota']['tmp_name'];
echo "<br>";


echo "<br>";
	// Apabila gambar tidak diganti
	if (empty($nama_nota)){
	    $sql = "UPDATE keuangan_internal SET 
	    					tanggal     	= '$tanggal',
	    					keterangan      = '$keterangan'
	                    WHERE id_internal	= '$ID'";
	    mysqli_query($koneksi,$sql);
	 	header('location:index.php');
	}else{

		$sql1    = "SELECT bukti FROM keuangan_internal where id_internal=$ID";
		$result1 = mysqli_query($koneksi,$sql1);
		$row1   = mysqli_fetch_assoc($result1);
		echo $img = $row1['bukti'];
		$gambar = "nota/".$img;

		if (!unlink($gambar)) {
			echo ("Error deleting $gambar");
		} else {
			echo ("Deleted $img SUCCES");
		}
	$nama_baru = round(microtime(true)). '.jpg' . end($nama_nota);//fungsi untuk membuat nama acak
	move_uploaded_file($tmp_name, "nota/". $nama_baru);
	    //move_uploaded_file($_FILES['gambar']['tmp_name'],'images/'.$nama_gambar);
		$sql2 = "UPDATE keuangan_internal SET 
	    					tanggal     	= '$tanggal',
	    					keterangan      = '$keterangan',
	    					bukti			= '$nama_baru'
	                    WHERE id_internal	= '$ID'";
	    mysqli_query($koneksi,$sql2);
	 	header('location:index.php');
	}

}  else{
    echo "Anda Belum Login, silahkan <a href='../../../index.php'>login</a>";
    }
?>

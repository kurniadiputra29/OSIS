<?php
//UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 

include '../../../config/koneksi.php';
echo $pemasukan = $_POST['pemasukan'];
echo "<br>";
echo $pengeluaran = $_POST['pengeluaran'];
echo $tanggal = $_POST['tanggal'];
echo $keterangan = $_POST['keterangan'];
echo "<br>";
echo $nama_nota = $_FILES['nota']['name'];
echo $tmp_name = $_FILES['nota']['tmp_name'];
echo "<br>";
$nama_baru = round(microtime(true)). '.jpg' . end($nama_nota);//fungsi untuk membuat nama acak
move_uploaded_file($tmp_name, "nota/". $nama_baru);

            $sql    = "SELECT * from keuangan_eksternal where id_eksternal IN(SELECT MAX(id_eksternal) FROM keuangan_eksternal)";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            echo $kas    = $row['saldo'];
echo "<br>";
	// Apabila gambar tidak diisi
	if (empty($pengeluaran)){

		echo $saldo = ($kas + $pemasukan);
		$sql = "INSERT INTO keuangan_eksternal (pemasukan, saldo, tanggal, keterangan, bukti) VALUES ('$pemasukan', '$saldo', '$tanggal', '$keterangan', '$nama_baru')";
		mysqli_query($koneksi,$sql);
		header('location:index.php');
	}else{

		echo $saldo = ($kas - $pengeluaran);
		$sql = "INSERT INTO keuangan_eksternal (pengeluaran, saldo, tanggal, keterangan, bukti) VALUES ('$pengeluaran', '$saldo', '$tanggal', '$keterangan', '$nama_baru')";
		mysqli_query($koneksi,$sql);
		header('location:index.php');
	}

}  else{
    echo "Anda Belum Login, silahkan <a href='../../../index.php'>login</a>";
    }
?>

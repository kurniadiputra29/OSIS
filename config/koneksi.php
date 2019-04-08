<?php
$server ="localhost";
$user	="root";
$pass	="123";
$db		="osis";

$koneksi = mysqli_connect($server, $user, $pass, $db);

if (!$koneksi) {
	die('keneksi gagal'. mysqli_connect_error());
}
$sql1 = "CREATE TABLE pengurus (
id_pengurus INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
nama VARCHAR(30) NOT NULL,
kelas VARCHAR(50) NOT NULL,
hp VARCHAR(20) NOT NULL,
alamat VARCHAR(100) NOT NULL,
jabatan VARCHAR(50) NOT NULL,
foto VARCHAR(50) NULL
)";

$sql2 = "CREATE TABLE tipe_proker (
id_type INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
nama VARCHAR(50) NOT NULL
)";

$sql3 = "CREATE TABLE program_kerja (
id_proker INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
jabatan VARCHAR(50) NOT NULL,
proker TEXT NULL,
deadline date,
id_type INT(11) NOT NULL
)";

$sql4 = "CREATE TABLE cek_proker (
id_cek INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_proker INT(11) NOT NULL,
jabatan INT(11) NOT NULL,
keterangan BOOLEAN,
alasan TEXT NULL
)";

$sql5 = "CREATE TABLE keuangan_internal (
id_internal INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
pemasukan INT(11) NULL,
pengeluaran INT(11) NULL,
saldo INT(11) NULL,
tanggal date,
keterangan TEXT NULL,
bukti varchar(50) NULL
)";

$sql6 = "CREATE TABLE keuangan_eksternal (
id_eksternal INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
pemasukan INT(11) NULL,
pengeluaran INT(11) NULL,
saldo INT(11) NULL,
tanggal date,
keterangan TEXT NULL,
bukti varchar(50) NULL
)";

$sql7 = "CREATE TABLE surat_masuk (
id_masuk INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
keperluan VARCHAR(50) NOT NULL,
masuk date,
deadline date,
dari VARCHAR(100) NOT NULL,
foto VARCHAR(50) NOT NULL
)";

$sql8 = "CREATE TABLE surat_keluar(
id_keluar INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
keperluan VARCHAR(50) NOT NULL,
keluar date,
deadline date,
kepada VARCHAR(100) NOT NULL,
foto VARCHAR(50) NOT NULL
)";

$sql9 = "CREATE TABLE inventarisasi(
id_inventaris INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_peralatan VARCHAR(50) NOT NULL,
jumlah INT(11) NOT NULL,
kondisi VARCHAR(50) NOT NULL,
pengecekan date
)";

$sql10 = "CREATE TABLE user (
id_user INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NULL,
foto VARCHAR(100) NULL,
id_role INT(11) NOT NULL
)";

$sql11 = "CREATE TABLE role (
id_role INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(50) NOT NULL
)"; 

$sql12 = "CREATE TABLE jabatan(
id_jabatan INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
nama VARCHAR(50) NOT NULL
)";

$sql13 = "CREATE TABLE peralatan (
id_peralatan INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
nama VARCHAR(50) NOT NULL,
type boolean
)";

mysqli_query($koneksi, $sql1);
mysqli_query($koneksi, $sql2);
mysqli_query($koneksi, $sql3);
mysqli_query($koneksi, $sql4);
mysqli_query($koneksi, $sql5);
mysqli_query($koneksi, $sql6);
mysqli_query($koneksi, $sql7);
mysqli_query($koneksi, $sql8);
mysqli_query($koneksi, $sql9);
mysqli_query($koneksi, $sql10);
mysqli_query($koneksi, $sql11);
mysqli_query($koneksi, $sql12);
mysqli_query($koneksi, $sql13);
?>
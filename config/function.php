<?php
include 'koneksi.php';

function user($id){
global $koneksi;
            
            $sql    = "select * from user where id=$id";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            return $row['name'];
}
function kategori($id){
global $koneksi;
            $sql    = "select * from kategori where id=$id";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            return  $row['nama'];
}
function status($id){
	if ($id == "1"){
		return "<b style='color:#173679;'> Terlaksana </b>";
	}	else {
		return "<b style='color:#d92626;'> Tidak Terlaksana </b>";
	}
}
function peralatan($id){
      if ($id == "1"){
            return "<b style='color:#173679;'> Peralatan </b>";
      }     else {
            return "<b style='color:#d92626;'> Perlengkapan </b>";
      }
}
function jabatan($id){
global $koneksi;
            $sql    = "select * from jabatan where id_jabatan=$id";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            return  $row['nama'];
}
function nama($id){
global $koneksi;
            $sql    = "select * from peralatan where id_peralatan=$id";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            return  $row['nama'];
}
function type($id){
global $koneksi;
            $sql    = "select * from tipe_proker where id_type=$id";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            return  $row['nama'];
}
function proker($id){
global $koneksi;
            $sql    = "select * from program_kerja where id_proker=$id";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            return  $row['proker'];
}
function rupiah($angka){ 
// untuk membuat format rupiah
      $hasil_rupiah = "Rp " . number_format($angka,0,' ','.');
      return $hasil_rupiah;
}
?>
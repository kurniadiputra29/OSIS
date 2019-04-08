<?php //UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OSIS | Surat</title>
  <?php
    include '../layout/header.php';
  ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OSIS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OSIS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <?php
            include '../layout/messages.php';
          ?>
          <!-- Notifications: style can be found in dropdown.less -->
          <?php
            include '../layout/notifications.php';
          ?>
          <!-- Tasks: style can be found in dropdown.less -->
          <?php
            include '../layout/tasks.php';
          ?>
          <!-- User Account: style can be found in dropdown.less -->
          <?php
            include '../layout/user.php';
          ?>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../foto_user/<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $_SESSION['name']; /*<?= $_SESSION['email']; ?> ini sama dengan echo dan ini fersi terpendek*/
          ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
          include '../layout/sidebar.php';
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Masuk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Keperluan</th>
                  <th>Masuk</th>
                  <th>Deadline</th>
                  <th>Dari</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>                
                <?php
                  include '../../config/koneksi.php';
                  include '../../config/function.php';
                  $nomor  = 1;
                  $sql    = "SELECT * FROM surat_masuk ";
                  $result = mysqli_query($koneksi,$sql);// untuk menghubungkan databases melalui $connect dengan isinya melalui $sql tetapi masih acak
                  if(mysqli_num_rows($result)>0){// jika nggak ada datanya maka while tidak di jalankan
                    while ($row = mysqli_fetch_assoc($result)) {// untuk memunculkan dalam bentuk rapi, mengambil dan dijadikan erray associative
                      echo "
                      <tr>
                        <td>".$nomor++."</td>
                        <td>".$row['keperluan']."</td>
                        <td>".$row['masuk']."</td>
                        <td>".$row['deadline']."</td>
                        <td>".$row['dari']."</td>
                        <td>".'<img style="width: 100px; height: 100px" src="foto/'.$row['foto']. ' " />'."</td>
                        <td>
                          <a href='edit.php?id=".$row['id_masuk']."' class='btn btn-primary btn-x5'>Edit</a> |
                          <a href='hapus.php?id=".$row['id_masuk']."' class='btn btn-danger btn-x5' onclick='javascript:return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>
                      ";
                    }
                  }
                  ?>
                </tr>
              </table>
            </div>
            <hr>
            <div class="box-header with-border">
              <h3 class="box-title">Surat Keluar</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Keperluan</th>
                  <th>Keluar</th>
                  <th>Deadline</th>
                  <th>Kepada</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>                
                <?php
                  include '../../config/koneksi.php';
                  include '../../config/function.php';
                  $nomor1  = 1;
                  $sql1    = "SELECT * FROM surat_keluar ";
                  $result1 = mysqli_query($koneksi,$sql1);// untuk menghubungkan databases melalui $connect dengan isinya melalui $sql tetapi masih acak
                  if(mysqli_num_rows($result1)>0){// jika nggak ada datanya maka while tidak di jalankan
                    while ($row1 = mysqli_fetch_assoc($result1)) {// untuk memunculkan dalam bentuk rapi, mengambil dan dijadikan erray associative
                      echo "
                      <tr>
                        <td>".$nomor1++."</td>
                        <td>".$row1['keperluan']."</td>
                        <td>".$row1['keluar']."</td>
                        <td>".$row1['deadline']."</td>
                        <td>".$row1['kepada']."</td>
                        <td>".'<img style="width: 100px; height: 100px" src="foto/'.$row1['foto']. ' " />'."</td>
                        <td>
                          <a href='edit.php?id=".$row1['id_keluar']."' class='btn btn-primary btn-x5'>Edit</a> |
                          <a href='hapus.php?id=".$row1['id_keluar']."' class='btn btn-danger btn-x5' onclick='javascript:return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>
                      ";
                    }
                  }
                  ?>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>


<!-- jQuery 3 -->
<?php
  include '../layout/scripts.php'
?>
</body>
</html>
<?php
 }  else{
    echo "Anda Belum Login, silahkan <a href='../../index.php'>login</a>";
    }
?>
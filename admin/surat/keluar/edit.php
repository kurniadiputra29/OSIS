<?php //UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OSIS | Surat Keluar</title>
  <?php
    include '../../layout/header.php';
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
            include '../../layout/messages.php';
          ?>
          <!-- Notifications: style can be found in dropdown.less -->
          <?php
            include '../../layout/notifications.php';
          ?>
          <!-- Tasks: style can be found in dropdown.less -->
          <?php
            include '../../layout/tasks.php';
          ?>
          <!-- User Account: style can be found in dropdown.less -->
          <?php
            include '../../layout/user.php';
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
          <img src="../../foto_user/<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image" style=" height: 50px; width: 50px;">
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
          include '../../layout/sidebar.php';
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat Keluar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Surat Keluar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Surat Keluar</h3>
            </div>
            <!-- /.box-header -->
             <?php
            include '../../../config/koneksi.php';
            include '../../../config/function.php';
            $ID     = $_GET['id'];
            $sql    = "SELECT * from surat_keluar where id_keluar=$ID";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            ?>
            <form class="form-horizontal" action="proses_edit.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $ID; ?> " >
                  <label for="keperluan" class="col-sm-2 control-label">Keperluan</label>
                  <div class="col-sm-10">
                    <input type="text" name="keperluan" class="form-control" id="keperluan" value="<?php echo $row['keperluan']; ?> " required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keluar" class="col-sm-2 control-label">Tanggal Keluar</label>
                  <div class="col-sm-10">
                    <input type="date" name="keluar" id="keluar" style="margin-top: 5px;" value="<?php echo $row['keluar']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="deadline" class="col-sm-2 control-label">Tanggal Deadline</label>
                  <div class="col-sm-10">
                    <input type="date" name="deadline" id="deadline" required style="margin-top: 5px;" value="<?php echo $row['deadline']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="kepada" class="col-sm-2 control-label">Kepada</label>
                  <div class="col-sm-10">
                    <input type="text" name="kepada" class="form-control" id="kepada" placeholder="Tujuan Surat" required value="<?php echo $row['kepada']; ?> ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="foto" class="col-sm-2 control-label">Bukti Fisik</label>
                  <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" >
                    <span><img style="width: 100px; height: 100px; margin-top: 15px;" src="foto/<?php echo $row['foto'];?>"</span>
                  </div>
                </div>
              </div><!--box-body-->
            <!-- /.box-header -->
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php
  include '../../layout/scripts.php'
?>
</body>
</html>
<?php
 }  else{
    echo "Anda Belum Login, silahkan <a href='../../../index.php'>login</a>";
    }
?>
<?php //UNTUK MENJAGA FIELD KITA, JIKA BELUM LOGIN
session_start(); // itu di simpan di browser, bukan di mysql, maupun phpmyadmin
if (isset($_SESSION['email'])) { // perbedaan isset dan empti adalah isset untuk mengecek data, 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OSIS | Laporan Keuangan Eksternal</title>
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
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
          include '../../layout/sidebar_keuangan.php';
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Keuangan Eksternal
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Keuangan Eksternal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Keuangan Eksternal</h3>
            </div>
            <!-- /.box-header -->
             <?php
            include '../../../config/koneksi.php';
            include '../../../config/function.php';
            $ID     = $_GET['id'];
            $sql    = "SELECT * from keuangan_eksternal where id_eksternal=$ID";
            $result = mysqli_query($koneksi,$sql);
            $row    = mysqli_fetch_assoc($result);
            ?>
            <form class="form-horizontal" action="proses_edit.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $ID; ?> " >
                  <label for="pemasukan" class="col-sm-2 control-label">Pemasukan</label>
                  <div class="col-sm-10">
                    <input type="number" name="pemasukan" class="form-control" id="pemasukan" value="<?php echo $row['pemasukan']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pengeluaran" class="col-sm-2 control-label">Pengeluaran</label>
                  <div class="col-sm-10">
                    <input type="number" name="pengeluaran" class="form-control" id="pengeluaran" value="<?php echo $row['pengeluaran']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" name="tanggal" id="tanggal" required style="margin-top: 5px;" value="<?php echo $row['tanggal']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $row['keterangan']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nota" class="col-sm-2 control-label">Nota</label>
                  <div class="col-sm-10">
                    <input type="file" name="nota" id="nota" >
                    <span><img style="width: 100px; height: 100px; margin-top: 15px;" src="nota/<?php echo $row['bukti'];?>"</span>
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
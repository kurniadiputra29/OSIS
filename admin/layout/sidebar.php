<?php 

$pagenow    = dirname($_SERVER['PHP_SELF']); echo "<br>";
// $activePage = print_r($pagenow); echo "<br>";
// $hamboh     = $pagenow; echo $hamboh;
// if($activePage == "/perpus_masjid/admin/layouts") {echo "active";} else {echo "";}
$url    = $_SERVER['PHP_SELF'];
$exp    = explode("/", $url);
$get    = $exp[3];

?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($get === "index.php") {echo "active";} else {echo "";}?>">
          <a href="http://localhost/osis/admin/index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($get === "jabatan" OR $get === "pengurus") {echo "treeview active menu-open";} else {echo "treeview";}?>">
          <a href="http://localhost/osis/admin/jabatan/index.php">
            <i class="fa fa-users"></i>
            <span>Kepengurusan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($get === "jabatan") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/jabatan/index.php"><i class="fa fa-circle-o"></i>Jabatan</a></li>
            <li class="<?php if($get === "pengurus") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/pengurus/index.php"><i class="fa fa-circle-o"></i>Pengurus OSIS</a></li>
          </ul>
        </li>

        <li class="<?php if($get === "type_proker" OR $get === "program_kerja") {echo "treeview active menu-open";} else {echo "treeview";}?>">
          <a href="http://localhost/osis/admin/program_kerja/index_proker.php">
            <i class="fa fa-book"></i>
            <span>Program</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($get === "type_proker") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/type_proker/index.php"><i class="fa fa-circle-o"></i>Type Program Kerja</a></li>
            <li class="<?php if($get === "program_kerja") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/program_kerja/index_proker.php"><i class="fa fa-circle-o"></i>Program Kerja</a></li>
          </ul>
        </li>
        <li class="<?php if($get === "pengawasan_proker") {echo "active";} else {echo "";}?>">
          <a href="http://localhost/osis/admin/pengawasan_proker/index.php">
           <i class="fa fa-calendar"></i>
            <span>Pengawasan Program Kerja</span>
          </a>
        </li>
        <li class="<?php if($get === "internal" OR $get === "eksternal" OR $get === "keuangan") {echo "treeview active menu-open";} else {echo "treeview";}?>">
          <a href="http://localhost/osis/admin/keuangan/index.php">
            <i class="fa fa-money"></i>
            <span>Laporan Keuangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($get === "internal") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/keuangan/internal/index.php"><i class="fa fa-circle-o"></i>Internal</a></li>
            <li class="<?php if($get === "eksternal") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/keuangan/eksternal/index.php"><i class="fa fa-circle-o"></i>External</a></li>
          </ul>
        </li>
        <li class="<?php if($get === "masuk" OR $get === "keluar" OR $get === "surat") {echo "treeview active menu-open";} else {echo "treeview";}?>">
          <a href="http://localhost/osis/admin/surat/index.php">
            <i class="fa fa-pie-chart"></i>
            <span>Administrasi Surat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($get === "masuk" OR $get === "surat") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/surat/masuk/index.php"><i class="fa fa-circle-o"></i>Masuk</a></li>
            <li class="<?php if($get === "keluar" OR $get === "surat") {echo "active";} else {echo "";}?>"><a href="http://localhost/osis/admin/surat/keluar/index.php"><i class="fa fa-circle-o"></i>Keluar</a></li>
          </ul>
        </li>
        <li class="<?php if($get === "peralatan") {echo "active";} else {echo "";}?>">
          <a href="http://localhost/osis/admin/peralatan/index.php">
           <i class="fa fa-cubes"></i>
            <span>Peralatan & Perlengkapan</span>
          </a>
        </li>
        <li class="<?php if($get === "inventarisasi") {echo "active";} else {echo "";}?>">
          <a href="http://localhost/osis/admin/inventarisasi/index.php">
           <i class="fa fa-edit (alias)"></i>
            <span>Inventarisasi</span>
          </a>
        </li>
        <li class="<?php if($get === "user") {echo "active";} else {echo "";}?>">
          <a href="http://localhost/osis/admin/user/index_user.php">
           <i class="fa fa-user"></i>
            <span>User</span>
          </a>
        </li>
        <li class="<?php if($get === "role") {echo "active";} else {echo "";}?>">
          <a href="http://localhost/osis/admin/role/index_role.php">
           <i class="fa fa-user"></i>
            <span>Role</span>
          </a>
        </li>
      </ul>
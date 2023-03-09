<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tambah Data - <?php require('get_title.php'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <!-- Ionicons 2.0.0 --> 
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
   <!--  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- Morris chart -->
    <!-- jvectormap -->
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/barut.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <ul class="sidebar-menu">
            <li class="header">MENU MASTER</li>
            <li class="treeview <?php if(!isset($_GET['page'])&& $_GET['page']=="tambah.php") { echo "active"; };
            if ($_SESSION['username'] !="admin"){ echo "hidden";};
             ?>">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>

            <li class="treeview <?php if(isset($_GET['page']) && $_GET['page']=="data_pegawai") { echo "active"; };
            if ($_SESSION['username'] !="admin"){ echo "hidden";};
             ?>">
              <a href="./?page=data_pegawai">
                <i class="fa fa-user"></i> <span>Data Pegawai</span> 
              </a>
            </li>

            <li class="treeview <?php if(isset($_GET['page']) && $_GET['page']=="data_jabatan") { echo "active"; };
            if ($_SESSION['username'] !="admin"){ echo "hidden";};
             ?>">
              <a href="./?page=data_jabatan">
                <i class="fa fa-group"></i> <span>Data jabatan</span> 
              </a>
            </li>

            <li class="treeview <?php if(isset($_GET['page']) && $_GET['page']=="data_pendidikan") { echo "active"; };
            if ($_SESSION['username'] !="admin"){ echo "hidden";};
             ?>">
              <a href="./?page=data_pendidikan">
                <i class="fa fa-graduation-cap"></i> <span>Data Pendidikan</span> 
              </a>
            </li>

            <li class="header">MENU LAN-LAIN</li>

            <li class="treeview <?php if(isset($_GET['page']) && $_GET['page']=="data_keseluruhan") { echo "active"; };
            if ($_SESSION['username'] !="admin"){ echo "hidden";};
             ?>">
              <a href="./?page=data_keseluruhan">
                <i class="fa fa-file"></i> <span>Data Keseluruhan</span> 
              </a>
            </li>

            <li class="treeview <?php if(isset($_GET['page']) && $_GET['page']=="data_sppd") { echo "active"; } ?>">
              <a href="./?page=data_sppd">
                <i class="fa fa-file"></i> <span>Data SPPD</span> 
              </a>
            </li>

            <li class="treeview <?php if(isset($_GET['page']) && $_GET['page']=="prb_pangkat") { echo "active"; };
            if ($_SESSION['username'] !="admin"){ echo "hidden";};
            ?>">
              <a href="./?page=perubahan_pangkat">
                <i class="fa fa-file"></i> <span>Data Perubahan Pangkat</span> 
              </a>
            </li>

            <?php if(!isset($_SESSION['username'])): ?>
             <li class="treeview">
              <a href="login.php">
                <i class="fa fa-lock"></i> <span>Login</span> 
              </a>
            </li>

          <?php else: ?>
            <li class="header">MENU ADMIN</li>
            <li class="<?php if(isset($_GET['page']) && $_GET['page']=="admin") { echo "active"; };
            if ($_SESSION['username'] !="admin"){ echo "hidden";};
             ?>">
            <a href="./?page=admin"><i class="fa fa-user text-warning"></i> Managemen User</a></li>
            
            <li class="treeview">
              <a href="logout.php">
                <i class="fa fa-backward text-danger"></i> <span>Log Out</span> 
              </a>
            </li>
          <?php endif; ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
            <?php require_once('mod_tambah.php'); ?>
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
           
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    
  </body>
</html>
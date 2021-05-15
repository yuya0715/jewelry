<?php 
 include("php/main/escape.php");
 include("php/main/db.php");



$aboutText = filter_input(INPUT_POST, 'aboutText');
$id = filter_input(INPUT_POST, 'id');

if (!empty($aboutText) ) {
  $sql = "UPDATE about_table SET content = :content WHERE id = :id";
$stmt = $dbh->prepare($sql);
$params = array(':content' => $aboutText, ':id' => $id );
$stmt->execute($params);
echo "<script>alert('更新が完了しました');</script>";
}

?>
<html lang="ja">
<head>
         <meta charset="utf-8">
         <title>ログインフォーム</title>

         <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
         <link rel="stylesheet" href="css/bootstrap.css">
     

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <span class="brand-link brand-text font-weight-light">管理者ページ</span>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="php/about/about.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>About</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="php/news/news.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>NEWS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="php/brand/brand.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="php/dropimg/drop.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>画像挿入</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="php/dropimg/img.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>画像一覧</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">管理者ID</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
         
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->



        <!-- AdminLTE App -->
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/main.js"></script>
      </body>
</html>
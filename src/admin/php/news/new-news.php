<?php 
 include("../main/escape.php");
 include("../main/db.php");
 include("../main/header.php");


?>


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
              <a href="../../index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>TOP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>About</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="news.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>NEWS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="brand.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="drop.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>画像挿入</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="img.php" class="nav-link active">
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
    <div class="container">
        <p>投稿日時</p>
        <input type="date" id="newNewsDate"  name="newNewsDate">
        <p>タイトル</p>
          <input id="newNewsTitle"  name="newNewsTitle">
        <p>挿入画像</p>
          <input type="file" id="newNewsImg"  name="newNewsImg">
        <p>内容</p>
          <textarea id="newNewsText" name="newNewsText">
          </textarea>
        <br>
        <br>
        <br>
        <br>
        <button id="newbtn">投稿する</button>
        <button id="newbtn">一時保存</button>
        <button id="rebtn" onclick="location.href='news.php'">
        投稿しないで一覧に戻る
      </button>
    </div>
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


  <?php
   include("../main/footer.php");
?>
<?php 
 include("../main/escape.php");
 include("../main/db.php");
 include("../main/header.php");


 $statusPost = filter_input(INPUT_POST, 'post');
 $statusSave = filter_input(INPUT_POST, 'save');
 $newId = strval(date("YmdHi")).strval(mt_rand(10,99)) ;
 $newNewsDates = explode("-",filter_input(INPUT_POST, 'newNewsDate'));
 $newNewsDate=$newNewsDates[0].$newNewsDates[1].$newNewsDates[2];
 $newNewsTitle = filter_input(INPUT_POST, 'newNewsTitle');
 $newNewsImg = filter_input(INPUT_POST, 'newNewsImg');
 $newNewsText = filter_input(INPUT_POST, 'newNewsText');
 $timestamp = date("YmdHi");
 
 //投稿ボタン
 if (!empty($statusPost)) {
  try {
    $stmt = $dbh->prepare("INSERT INTO news_table(news_id,news_day,news_title,news_text,news_image,news_status,news_timestamp) VALUES(:news_id,:news_day,:news_title,:news_text,:news_image,:news_status,:news_timestamp)");
    $stmt->bindValue(':news_id', $newId, PDO::PARAM_STR);
    $stmt->bindValue(':news_day', $newNewsDate, PDO::PARAM_STR);
    $stmt->bindValue(':news_title', $newNewsTitle, PDO::PARAM_STR);
    $stmt->bindValue(':news_text', $newNewsText, PDO::PARAM_STR);
    $stmt->bindValue(':news_image', $newNewsImg, PDO::PARAM_STR);
    $stmt->bindValue(':news_status', $statusPost, PDO::PARAM_STR);
    $stmt->bindValue(':news_timestamp', $timestamp, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('投稿しました');</script>";
    header('Location:index.php');
  } catch (PDOException $e) {
    exit($e);
  };
};

 //一時保存ボタン
 if (!empty($statusSave)) {
  try {
    $stmt = $dbh->prepare("INSERT INTO news_table(news_id,news_day,news_title,news_text,news_image,news_status,news_timestamp) VALUES(:news_id,:news_day,:news_title,:news_text,:news_image,:news_status,:news_timestamp)");
    $stmt->bindValue(':news_id', $newId, PDO::PARAM_STR);
    $stmt->bindValue(':news_day', $newNewsDate, PDO::PARAM_STR);
    $stmt->bindValue(':news_title', $newNewsTitle, PDO::PARAM_STR);
    $stmt->bindValue(':news_text', $newNewsText, PDO::PARAM_STR);
    $stmt->bindValue(':news_image', $newNewsImg, PDO::PARAM_STR);
    $stmt->bindValue(':news_status', $statusSave, PDO::PARAM_STR);
    $stmt->bindValue(':news_timestamp', $timestamp, PDO::PARAM_STR);
    $stmt->execute();
    echo "<script>alert('一時保存しました');</script>";
    header('Location:index.php');
  } catch (PDOException $e) {
    exit($e);
  };
};





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
        <form id="form" action="" method="post">
          <p>投稿日時</p>
          <input type="date" id="newNewsDate" name="newNewsDate">
          <p>タイトル</p>
          <input id="newNewsTitle" name="newNewsTitle">
          <p>挿入画像</p>
          <input type="file" id="newNewsImg" name="newNewsImg">
          <p>内容</p>
          <textarea id="newNewsText" name="newNewsText">
          </textarea>
          <br>
          <br>
          <br>
          <br>
          <input type="submit" name="post" value="投稿">
          <input type="submit" name="save" value="一時保存">
        </form>
        <button id="rebtn" onclick="location.href='index.php'">
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
<?php 
 include("../main/escape.php");
 include("../main/db.php");
 include("../main/header.php");

 $id = $_GET["id"];
 $newNewsDate=filter_input(INPUT_POST, 'newNewsDate');
 $newNewsTitle = filter_input(INPUT_POST, 'newNewsTitle');
 $newNewsText = filter_input(INPUT_POST, 'newNewsText');
 $newNewsImg = filter_input(INPUT_POST, 'newNewsImg');
 $statusPost = filter_input(INPUT_POST, 'post');
 $statusSave = filter_input(INPUT_POST, 'save');
 $timestamp = date("YmdHi");

//  UPDATE 
//投稿ボタン
 if (!empty($statusPost)) {
    $sql = "UPDATE news_table SET news_id = :news_id,news_day = :news_day,news_title = :news_title,news_text = :news_text,news_image = :news_image,news_status = :news_status,news_timestamp=:news_timestamp  WHERE  news_id = :news_id";
    $stmt = $dbh->prepare($sql);
    $params = array(':news_id' => $id,':news_day' => $newNewsDate,':news_title' => $newNewsTitle,':news_text' =>$newNewsText,':news_image' =>$newNewsImg,':news_status' =>$statusPost,':news_timestamp' =>$timestamp);
    $stmt->execute($params);
    echo "<script>alert('投稿しました');</script>";
    header('Location:index.php');
}

 //一時保存ボタン
if (!empty($statusSave)) {
    $sql = "UPDATE news_table SET news_id = :news_id,news_day = :news_day,news_title = :news_title,news_text = :news_text,news_image = :news_image,news_status = :news_status,news_timestamp=:news_timestamp  WHERE  news_id = :news_id";
    $stmt = $dbh->prepare($sql);
    $params = array(':news_id' => $id,':news_day' => $newNewsDate,':news_title' => $newNewsTitle,':news_text' =>$newNewsText,':news_image' =>$newNewsImg,':news_status' =>$statusSave,':news_timestamp' =>$timestamp);
    $stmt->execute($params);
    echo "<script>alert('一時保存しました');</script>";
    header('Location:index.php');
}


//  DELETE 
$delite = filter_input(INPUT_POST, 'delite');
if (!empty($delite)) {
    $sql = "DELETE FROM news_table WHERE news_id = :news_id";
    $stmt = $dbh->prepare($sql);
    $params = array(':news_id'=>$id);
    $stmt->execute($params);
    echo  "<script>alert('削除が完了しました');</script>";
    header('Location:index.php');
}

 $sth =  $dbh->prepare("SELECT * FROM news_table");
 $sth->execute(); 
 $rows = $sth->fetchAll();
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
      <?php foreach ($rows as $row) :
         if ($id === $row['news_id']):?>
          <form id="form" action="" method="post">
            <p>投稿日時</p>
            <input id="newNewsDate" name="newNewsDate" value="<?php echo h($row['news_day']); ?>">
            <p>タイトル</p>
            <input id="newNewsTitle" name="newNewsTitle" value="<?php echo h($row['news_title']); ?>">
            <p>挿入画像</p>
            <input id="newNewsImg" name="newNewsImg" value="<?php echo h($row['news_image']); ?>">
            <p>内容</p>
            <textarea id="newNewsText" name="newNewsText"><?php echo h($row['news_text']); ?></textarea>
      <?php endif; 
       endforeach; ?>
            <br>
            <br>
            <br>
            <br>
            <input type="submit" name="post" value="投稿">
            <input type="submit" name="save" value="一時保存">
          </form>
            <button id="rebtn" onclick="location.href='index.php'">投稿しないで一覧に戻る</button>
          <form id="form" action="" method="post">
            <input type="submit" name="delite" value="記事を削除する"></button>
          </form>
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